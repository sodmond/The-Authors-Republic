@extends('layouts.app', ['activePage' => 'about', 'title' => 'About Us'])

@section('content')
<section class="tg-sectionspace tg-haslayout tg-aboutusshortcode" id="home-about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-push-0 mb-3 vcenter">
                <div class="tg-sectionhead" style="padding: 0 0px 15px 0;">
                    <h2 style="line-height:35px;">What is “the authors republic” about?</h2>
                </div>
                <p>The Authors Republic provides authors and creatives with a professional, well-curated space to share their 
                    works, showcase their talents, and reach a broader audience. Here, authors and creatives can engage in 
                    meaningful discussions, collaborate on projects, and receive feedback from peers—all in an environment 
                    that prioritizes creativity and focus. It’s a republic for fostering a vibrant and supportive literary 
                    community.
                </p>
                <a class="tg-btn tg-active" href="#why-section">Learn more</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-pull-0">
                <img src="{{ asset('img/about-banner.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!--************************************
        Call to Action Start
*************************************-->
<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" {{--data-image-src="{{ asset('frontend/images/parallax/bgparallax-06.jpg') }}"--}}>
    <div class="tg-haslayout" style="padding:50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="tg-calltoaction aboutus-section" style="padding:0 !important;">
                        <h2 style="color:#000;">Vision Statement</h2>
                        <h5>To create a vibrant and inclusive community that empowers authors, Poets and book writers to showcase their literary craftsmanship, collaborate, educate and inspire one another on their creative journey of shaping the society with words.</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-calltoaction aboutus-section" style="padding:0 !important;">
                        <h2 style="color:#000;">Mission Statement</h2>
                        <h5>The Authors' Republic aims to be the unique digital platform that fosters connections, networking, facilitates the exchange of ideas, and provides opportunities for authors, Poets and book writers to grow, learn, and achieve their literary aspirations.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Call to Action End
*************************************-->

<section class="tg-sectionspace tg-haslayout" style="padding-top: 0;" id="why-section">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-aboutusshortcode">
                        <div class="tg-sectionhead" style="padding-right: 0;">
                            <h2 style="width:100%;" class="text-center">Why “the authors' republic”?</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-sm-center">
                                <p>
                                    <strong>U</strong>ntil recently, the Nigerian creative community—especially authors—had limited options when it came to 
                                    truly effective collaboration. Many relied on platforms like WhatsApp groups to share their work, 
                                    network, and seek support. However, these platforms were not specifically designed to accommodate the 
                                    unique needs of authors and creatives. They lacked the structure and focus required for meaningful 
                                    interaction, often becoming cluttered with irrelevant posts, distractions, and off-topic discussions that 
                                    diluted their purpose. This left Nigerian authors and creatives without a dedicated, streamlined space 
                                    where they could thrive creatively and professionally.
                                </p>
                                <p>
                                    <strong>T</strong>his is where The Authors Republic comes in. Like most creatives, Dickson Ekhaguere and Yomi Akinfesoye 
                                    were members of multiple WhatsApp groups for writers. However, they soon grew frustrated by the 
                                    limitations of these informal spaces. They faced constant distractions, missed important messages amidst 
                                    floods of irrelevant content, and found it increasingly difficult to have the deep, focused conversations 
                                    needed for genuine collaboration and growth. These platforms, built without the needs of authors in mind, 
                                    simply couldn't foster the vibrant, organized community that the Nigerian literary scene desperately 
                                    needed.
                                </p>
                                <p>
                                    <strong>R</strong>ecognizing this gap, Yomi and Dickson decided to act. Their solution came to life during a discussion on 
                                    August 5, 2023. They envisioned a centralized platform dedicated solely to authors and creatives —a place 
                                    free from the chaos of overpopulated messaging apps like WhatsApp, Facebook, etc. where creatives could 
                                    engage in serious conversations, collaborate meaningfully, and grow their craft without distraction. 
                                    This conversation marked the birth of The Authors Republic.
                                </p>
                            </div>
                            <div class="col-md-6 text-sm-center">
                                <p>
                                    <strong>W</strong>ith a robust, user-friendly website as its foundation, The Authors Republic provides Nigerian authors 
                                    and creatives with a professional, well-curated space to share their work, showcase their talents, and 
                                    reach a broader audience. Unlike WhatsApp groups that often collapse under the weight of irrelevant 
                                    content, this platform is purpose-built to nurture the literary community. Here, authors can engage in 
                                    meaningful discussions, collaborate on projects, and receive feedback from peers—all in an environment 
                                    that prioritizes creativity and focus.
                                </p>
                                <p>
                                    <strong>T</strong>he vision behind The Authors Republic extends beyond simple collaboration. It aims to cultivate a vibrant, 
                                    supportive community where literary expression can flourish without barriers. Authors and creatives are 
                                    empowered to push the boundaries of their work, connect with like-minded individuals, and explore new 
                                    opportunities. Whether it’s publishing new content, selling works, collaborating on innovative projects, 
                                    or simply engaging in enriching dialogue, podcasting, etc., the platform offers limitless possibilities 
                                    for growth.
                                </p>
                                <p>
                                    <strong>W</strong>ith The Authors Republic, Nigerian authors and creatives finally have a home tailored to their 
                                    needs—a centralized hub where creativity meets community, and where authors can explore the full 
                                    potential of their craft without the clutter and distractions of traditional social media platforms. 
                                    The goal is clear: to foster a dynamic, innovative space where creatives can flourish, push 
                                    boundaries, and connect with others who share their passion for the literary arts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--************************************
        Team section starts here
*************************************-->
<section class="tg-sectionspace tg-haslayout" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="tg-about-us">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tg-aboutusteam">
                    <div class="tg-sectionhea" id="teamHeader" style="padding-right:0; padding-bottom:20px;">
                        <h2 style="width:100%" class="text-center">Our Team</h2>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="panel panel-default shadow">
                                <div class="panel-body p-4 text-center">
                                    <img src="{{ asset('img/yomi.jpg') }}" alt="Yomi Akinfesoye's Picture" style="max-width:60%; border-radius:200px;">
                                    <div class="tg-sectionhead" style="padding: 0 10px 10px 0;">
                                        <h2 class="text-center" style="width:100%; line-height:50px;">Yomi Akinfesoye<span>Co-Founder, “The Authors Republic”</span></h2>
                                    </div>
                                    <p>Yomi Akinfesoye is a chemical Engineering graduate of Obafemi Awolowo University and currently practice as an Engineer. As a co-founder of “the authors republic” he brings a unique blend of technical expertise and a passion for the literary arts. With a background in chemical engineering, he has honed his analytical skills and attention to details, which have translated seamlessly into his writing endeavors.</p>
                                    <p>Yomi's literary journey began with the publication of two books, including the popular "Reckless Audacity," which delves into the COVID-19 pandemic and the leadership challenges that exacerbated the crisis. In addition, he has authored several technical engineering papers, which have been presented and published both locally in Nigeria and internationally. By drawing on his diverse experiences and understanding of the literary landscape, he strives to empower the creative community and foster an environment that celebrates the power of the pen on paper.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default shadow">
                                <div class="panel-body p-4 text-center">
                                    <img src="{{ asset('img/dickson.jpg') }}" alt="Dickson Ekhaguere's Picture" style="max-width:60%; border-radius:200px;">
                                    <div class="tg-sectionhead" style="padding: 0 10px 10px 0;">
                                        <h2 class="text-center" style="width:100%; line-height:50px;">Dickson Ekhaguere<span>Co-Founder, “The Authors Republic”</span></h2>
                                    </div>
                                    <p>Dickson Ekhaguere is an award-winning Nigerian author, playwright, editor, and entrepreneur. He is a co-founder of The Authors Republic and brings almost two decades of experience in writing, authorship, book selling, marketing, and more. He currently serves as a director at Tryspect Solutions, a writing and publishing company. He is best known for his work titled Unstable, which won the 2015 Association of Nigerian Authors Award and was longlisted for the prestigious NLNG Nigerian Prize for Literature in 2018. Unstable was staged at the Muson Centre in Lagos, featuring stage veterans such as Nollywood star Tina Mba, Ropo Eweala, Bassey Okon, and a stellar cast of others. Between 2020 and 2024, his book Nigerian Superheroes was listed as a recommended text for schools in Lagos by the Ministry of Education, Lagos State. It is also currently listed as an approved text for schools by the Ministry of Education, Edo State. He is a contributor to major publishing companies in Nigeria.</p>
                                    <p>Dickson is very passionate about the Nigerian creatives ecosystem. His partnership with Yomi Akinfesoye to birth the Authors Republic was a significant step toward empowering African writers and creatives..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default shadow">
                                <div class="panel-body p-4 text-center">
                                    <img src="{{ asset('img/thelma.jpg') }}" alt="Thelma Chris-Ilems' Picture" style="max-width:60%; border-radius:200px;">
                                    <div class="tg-sectionhead" style="padding: 0 10px 10px 0;">
                                        <h2 class="text-center" style="width:100%; line-height:50px;">Thelma Chris-Ilems<span>Media Relations, “The Authors Republic”</span></h2>
                                    </div>
                                    <p>A passionate broadcaster par excellence and lover of literary works, Thelma Ilems brings an infectious enthusiasm to the world of media and literature. With a background in journalism and communication, she has honed her skills in delivering compelling stories and engaging interviews. A lifelong reader, Thelma has an insatiable appetite for READING-ALOUD, exploring a wide range of genres from classic literature to contemporary fiction and non-fiction.</p>
                                    <p>With over 15 years of experience in radio broadcasting, Thelma Ilems has developed a keen ability to connect with wide audiences. Whether on-air or behind the scenes, she is known for her articulate voice, warm personality, and thought-provoking content. From hosting live shows to covering significant literary events, Thelma thrives in bringing culture, literature, and human interest stories to the forefront of public discussion.</p>
                                    <p>This literary passion is reflected in one of the several shows she has hosted on radio, The On-Air-Book Club where she features emerging and known writers, young and old. Thelma Ilems is also The Creator of The Awesome Sound of Books and The Fine Art of Reading Summer Boot Camp.</p>
                                </div>
                            </div>
                        </div>
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