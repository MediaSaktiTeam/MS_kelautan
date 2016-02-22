@extends('front.layout.main')

@section('title')
{{ $page->judul }}
@endsection

<?php
    $content = strip_tags($page->konten);
    $dot = ".";

    $position = stripos ($content, $dot); //find first dot position

    if($position) { //if there's a dot in our soruce text do
        $offset = $position + 1; //prepare offset
        $position2 = stripos ($content, $dot, $offset); //find second dot using offset
        $first_two = substr($content, 0, $position2); //put two first sentences under $first_two

        $deskripsi = $first_two . '.';
    }

    else { 
        $deskripsi = $page->judul . " Dinas Perikanan dan Kelautan Kab. Bantaeng";
    }
?>

@section('title')
{{ $deskripsi }}
@endsection

@section('konten')

            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                
                <div class="top-headline">
                
                    <h1 class="headline-title">{{ $page->judul }}</h1>

                    <div class="separator"><i class="fa fa-anchor"></i></div>

                    <h4 class="description">
                        {{ $deskripsi }}
                    </h4>

                </div> <!-- end headline -->

            </div> <!-- end col-sm-8 -->

        </div>  <!-- end container -->

    </header>
    <!-- END HEADER -->


    <!-- ABOUT -->
    <section class="section-about">
        
        <div class="container">
            
            <div class="about-left col-sm-12">
                
                <!-- <h3 class="about-title">{{ $page->judul }}</h3> -->

                <p class="about-p">{!! $page->konten !!}</p>

            </div> <!-- end col-sm-6 -->

        </div> <!-- end container -->
    
    </section>
@endsection


