<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CalculateEarnings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculate-earnings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate earnings for author from daily sales';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Author earnings calculation started');
        Order::where('status', 'completed')->where('earning_status', false)->lazyById()->each(function ($order) {
            $orderItems = $order->orderContent;
            for ($i=0; $i < count($orderItems); $i++) {
                $book = Book::find($orderItems[$i]->book_id);
                $author = Author::find($book->author_id);
                $amountEach = ($orderItems[$i]->amount * $orderItems[$i]->quantity);
                $after_balance = ($author->balance + $amountEach);
                Earning::create([
                    'author_id'     => $author->id,
                    'order_id'      => $order->id,
                    'pre_balance'   => $author->balance,
                    'amount'        => $amountEach,
                    'after_balance' => $after_balance,
                ]);
                $author->update(['balance' => $after_balance]);
            }
            Order::where('id', $order->id)->update(['earning_status' => true]);
        });
        Log::info('Author earnings calculation completed');
        return Command::SUCCESS;
    }
}
