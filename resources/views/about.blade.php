@extends('layouts.app', ['activePage' => 'about', 'title' => 'About Us'])

@section('content')
<!--************************************
        Call to Action Start
*************************************-->
<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" {{--data-image-src="{{ asset('frontend/images/parallax/bgparallax-06.jpg') }}"--}}>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="tg-calltoaction" style="padding:20px !important;">
                        <h2 style="color:#000;">Vision Statement</h2>
                        <h4>To create a vibrant and inclusive community that empowers authors, Poets and book writers to showcase their literary craftsmanship, 
                            collaborate, educate and inspire one another on their creative journey of shaping the society with words.</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-calltoaction" style="padding:20px !important;">
                        <h2 style="color:#000;">Mission Statement</h2>
                        <h4>The Authors' Republic aims to be the unique digital platform that fosters connections, networking, facilitates the exchange of ideas, 
                            and provides opportunities for authors, Poets and book writers to grow, learn, and achieve their literary aspirations.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Call to Action End
*************************************-->

<section class="tg-sectionspace tg-haslayout" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus mb-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="tg-aboutusshortcode">
                        <div class="tg-sectionhead">
                            <h2 style="width:100%;" class="text-sm-center"><span>Meet</span>Our Team</h2>
                        </div>
                        <div class="tg-description">
                            <p class="mb-3">The Authors Republic was born out of the frustration experienced by literary professionals on the WhatsApp platform. The WhatsApp group, intended to foster collaboration and support, had become inundated with irrelevant posts and distractions, making it an ineffective tool for great and vibrant minds to connect and showcase their work
                                Recognizing the need for a dedicated, distraction-free platform, The Authors Republic was birthed during a discussion between two authors on the whatsapp platform. The focus of the phone conversation on August 5, 2023 was how to provide a centralized hub where the literary community could thrive, hence the authors' republic.</p>
                            <p>By offering a robust and user-friendly website, authors and creatives can now reach a wider audience, showcase their talents, and engage in meaningful discussions without the clutter of an overcrowded messaging app like whatsapp. The goal is to cultivate a vibrant, supportive, and streamlined environment for the literary arts to flourish.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <figure>
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" alt="image description">
                        <iframe src="https://www.youtube.com/embed/acwr_Islo9A?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img class="img-responsive" src="{{ asset('frontend/images/author/imag-25.jpg') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="tg-sectionhead" style="padding: 0 10px 10px 0;">
                            <h2 style="line-height:50px;">Yomi Akinfesoye<span>Co-Founder, “The Authors Republic”</span></h2>
                        </div>
                        <p>Yomi Akinfesoye is a chemical Engineering graduate of Obafemi Awolowo University and currently practice as an Engineer. As a co-founder of “the authors republic” he brings a unique blend of technical expertise and a passion for the literary arts. With a background in chemical engineering, he has honed his analytical skills and attention to details, which have translated seamlessly into his writing endeavors.</p>
                        <p>Yomi’s literary journey began with the publication of two books, including the popular "Reckless Audacity," which delves into the COVID-19 pandemic and the leadership challenges that exacerbated the crisis. In addition, he has authored several technical engineering papers, which have been presented and published both locally in Nigeria and internationally. By drawing on his diverse experiences and understanding of the literary landscape, he strives to empower the creative community and foster an environment that celebrates the power of the pen on paper.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img class="img-responsive" src="{{ asset('frontend/images/author/imag-25.jpg') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="tg-sectionhead" style="padding: 0 10px 10px 0;">
                            <h2 style="line-height:50px;">Dickson Ekhaguere<span>Co-Founder, “The Authors Republic”</span></h2>
                        </div>
                        <p>Dickson Ekhaguere is an award-winning Nigerian author, playwright, editor, and entrepreneur. He is a co-founder of The Authors Republic and brings almost two decades of experience in writing, authorship, book selling, marketing, and more. He currently serves as a director at Tryspect Solutions, a writing and publishing company. He is best known for his work titled Unstable, which won the 2015 Association of Nigerian Authors Award and was longlisted for the prestigious NLNG Nigerian Prize for Literature in 2018. Unstable was staged at the Muson Centre in Lagos, featuring stage veterans such as Nollywood star Tina Mba, Ropo Eweala, Bassey Okon, and a stellar cast of others. Between 2020 and 2024, his book Nigerian Superheroes was listed as a recommended text for schools in Lagos by the Ministry of Education, Lagos State. It is also currently listed as an approved text for schools by the Ministry of Education, Edo State. He is a contributor to major publishing companies in Nigeria.</p>
                        <p>Dickson is very passionate about the Nigerian creatives ecosystem. His partnership with Yomi Akinfesoye to birth the Authors Republic was a significant step toward empowering African writers and creatives..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        About Us End
*************************************-->
<!--************************************
        Success Start
*************************************-->
{{--<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-successstory">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Our Pride Moments</span>Journey of Success</h2>
                    </div>
                    <div id="tg-successslider" class="tg-successslider tg-success owl-carousel">
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--************************************
        Success End
*************************************-->
@endsection