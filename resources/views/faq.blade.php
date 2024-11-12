@extends('layouts.app', ['activePage' => 'faq', 'title' => 'Frequestly Asked Questions'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-contactus">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-faq">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tg-sectionhead" style="padding-bottom:10px !important; float:none;">
                                    <h3>For Authors</h3>
                                </div>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#authorOne" aria-expanded="true" aria-controls="authorOne">
                                                    How can i resize my image online?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="authorOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>To resize an image online, you can use free tools that allow you to adjust the dimensions without needing software installation. Here are a few popular options:</p>
                                                <ul>
                                                    <li>
                                                        <strong>PicResize (<a href="https://www.picresize.com" target="_blank">www.picresize.com</a>)</strong>
                                                        <p>Upload your image, choose the new dimensions, and download the resized version.</p>
                                                    </li>
                                                    <li>
                                                        <strong>ResizeImage.net (<a href="https://www.resizeimage.net" target="_blank">www.resizeimage.net</a>)</strong>
                                                        <p>Upload an image, manually enter the new width and height, and download the resized image.</p>
                                                    </li>
                                                    <li>
                                                        <strong>Canva (<a href="https://www.canva.com" target="_blank">www.canva.com</a>)</strong>
                                                        <p>Canva offers a resizing tool where you can input specific dimensions for free.</p>
                                                    </li>
                                                    <li>
                                                        <strong>ILoveIMG (<a href="https://www.iloveimg.com/resize-image" target="_blank">www.iloveimg.com/resize-image</a>)</strong>
                                                        <p>Upload your image, set the new dimensions or percentage scale, and download the resized version.</p>
                                                    </li>
                                                    <li>
                                                        <strong>Adobe Express (<a href="https://www.adobe.com/express/feature/image/resize" target="_blank">www.adobe.com/express/feature/image/resize</a>)</strong>
                                                        <p>Offers a straightforward way to resize images by entering the dimensions or selecting a preset.</p>
                                                    </li>
                                                </ul>
                                                <p>These tools support various file formats, and most are easy to use.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#authorTwo" aria-expanded="false" aria-controls="authorTwo">
                                                    What information do I need to provide when creating an author's profile
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="authorTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                When creating an author profile, you'll be asked to provide your full name, biography, contact information, and details about your published books or upcoming projects. You can also upload a profile picture and link to your social media accounts.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author3" aria-expanded="trfalseue" aria-controls="author3">
                                                    Why do I need to include my birthday and year of birth?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                This is to enable the celebration of authors on their birthday on the platform and also in the monthly newsletter. Including the year of birth will allow special celebration when milestones are reached.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author4" aria-expanded="false" aria-controls="author4">
                                                    Can I update my published books and upcoming projects on my profile?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Yes, you can easily update the information about your published books and any upcoming projects or manuscripts you have in the pipeline. The platform allows you to add new titles, provide descriptions, and indicate publication status.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author5" aria-expanded="false" aria-controls="author5">
                                                    How do I upload and host a podcast on the site?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                The platform has built-in podcast hosting capabilities. You can record your audio files and upload them directly to your author profile. The site will then generate an RSS feed that readers can subscribe to, allowing them to listen to your podcast episodes.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author6" aria-expanded="false" aria-controls="author6">
                                                    Is there a way to connect with other authors and collaborate on projects?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Absolutely. The platform has a community feature that allows you to connect with other authors, send direct messages, and explore opportunities for collaboration, such as co-writing projects, guest posts, or joint marketing efforts.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author7" aria-expanded="false" aria-controls="author7">
                                                    Can I control the visibility of my personal information on my profile?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Yes, the platform gives you full control over the visibility of your personal information. You can choose to make certain details, like your email address or phone number, visible only to you or to select other users. (The web developer will provide better answer here)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author8" aria-expanded="false" aria-controls="author8">
                                                    What are the benefits of having a profile on this platform?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Some key benefits include increased visibility and discoverability for your work, the ability to connect with readers and industry professionals, access to podcast hosting, and tools for managing and promoting your literary activities.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author9" aria-expanded="false" aria-controls="author9">
                                                    Is there a way to promote my books or upcoming events on the website?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                The platform offers various promotional features, such as the ability to highlight new releases, upcoming book signings or literary events, and special offers or discounts. You can also utilize the site's marketing tools to reach a wider audience.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author10" aria-expanded="false" aria-controls="author10">
                                                    How secure is the storage of my personal and professional information?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                We take the security and privacy of your data very seriously. All information stored on the platform is encrypted and protected by industry-standard security measures. You can rest assured that your personal and professional details are kept safe and confidential.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author11" aria-expanded="false" aria-controls="author11">
                                                    Can I edit or update my profile information at any time?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Yes, you can update your profile information at any time. Whether it's changing your biography, adding new book titles, or modifying your contact details, the platform allows you to easily manage and maintain your author profile.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author12" aria-expanded="false" aria-controls="author12">
                                                    What kind of analytics or insights can I access about the engagement with my profile?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                The platform provides detailed analytics and insights about the engagement with your author profile. You can view metrics such as page views, podcast downloads, books sold and interactions (comments, shares, etc.) to better understand how your content and presence are resonating with the community.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author13" aria-expanded="false" aria-controls="author13">
                                                    Do I need to pay as an author to join the authors’ republic
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                NO. Joining the authors' republic is free of charge. Just enter your information as required and click on the submit button. The admin will review and then approve your request.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#author14" aria-expanded="false" aria-controls="author14">
                                                    Do I need to pay as an author to use tools on the platform for my book launch, marketing, pod cast or blog?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="author14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Use of the platform for promoting individual literary works is free. However, we welcome free donation to help in supporting the platform. (Can we have a link or button “Donate”)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tg-sectionhead" style="padding-bottom:10px !important; float:none;">
                                    <h3>For Customers</h3>
                                </div>
                                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customerOne" aria-expanded="true" aria-controls="customerOne">
                                                    How can I discover new authors and their work on this platform?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customerOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                The platform offers various discovery tools, such as browsing by genre, searching for specific authors or book titles, and exploring curated lists or recommendations. You can also follow your favorite authors to stay up-to-date on their latest projects.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customerTwo" aria-expanded="false" aria-controls="customerTwo">
                                                    Is there a way to follow specific authors and receive updates on their activities?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Yes, you can follow your favorite authors on the platform. This will allow you to receive notifications about their new book releases, podcast episodes, upcoming events, and other updates directly to your account.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer3" aria-expanded="trfalseue" aria-controls="customer3">
                                                    Can I interact with authors directly through the platform?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Absolutely. The platform enables direct communication between readers/fans and authors. You can leave comments on author profiles, send direct messages, and even participate in virtual author events or Q&A sessions.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer4" aria-expanded="false" aria-controls="customer4">
                                                    How can I access and listen to the podcasts hosted on the website?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                The platform has a dedicated podcast section where you can browse, search, and listen to the various podcasts hosted by authors on the site. You can also subscribe to your favorite podcast feeds and receive new episodes as they are released.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer5" aria-expanded="false" aria-controls="customer5">
                                                    Is there a way to connect with other readers or industry professionals on the site?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Yes, the platform has community features that allow you to connect with other readers, fans, and industry professionals, such as editors, agents, or publishers. You can join discussion groups, participate in forums, and network with like-minded individuals.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer6" aria-expanded="false" aria-controls="customer6">
                                                    What are the benefits of creating an account on this platform?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Some key benefits of creating an account include the ability to follow your favorite authors, access exclusive content or events, leave reviews and feedback, and participate in the literary community. You can also save your preferences and personalize your experience on the site.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer7" aria-expanded="false" aria-controls="customer7">
                                                    How can I find information about upcoming literary events or conferences?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                The platform has a dedicated section for literary events, conferences, and workshops. You can browse upcoming events, filter by location or topic, and even register or purchase tickets directly through the site.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer8" aria-expanded="false" aria-controls="customer8">
                                                    Is there a way to leave reviews or feedback on authors' profiles?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Yes, the platform allows you to leave reviews, ratings, and feedback on authors' profiles. This helps other readers discover new writers and provides valuable insights to the authors themselves.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer9" aria-expanded="false" aria-controls="customer9">
                                                    Can I access any educational or professional resources on the website?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Absolutely. The platform offers a range of educational and professional resources for writers, such as writing tips, publishing guides, industry news, and even job postings or freelance opportunities.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer10" aria-expanded="false" aria-controls="customer10">
                                                    How can I stay informed about the latest news and updates from the platform?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                You can subscribe to the platform's newsletter to receive regular updates on new features, author spotlights, community events, and other news and announcements. You can also follow the platform's social media channels for the latest updates.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading bg-custom" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#customer11" aria-expanded="false" aria-controls="customer11">
                                                    Is the platform open to other professional in the literary space apart from authors
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="customer11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Yes. Other users category allows any professional that has something to do with books such book publishers, librarian, research students, educationist, Journalists etc.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection