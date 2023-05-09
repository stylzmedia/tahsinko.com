@extends('front.layouts.master')
@php
    $page_title="Service";
    $faqs = \App\Models\Faq::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])

<style>



.accordions{
    width: 80%;
    margin: auto;
    font-family: 'Montserrat';
}
.accordions p:before {
    content: "Ans: ";
    color: red;
    font-weight: 700;
}

.faq .description p {
    color: #000;
    padding: 0 16px;
    text-align: justify;
    font-size: 16px;
    line-height: 1.5;
    font-weight: 400;
}

#qa_title {
    width: 55%;
    margin: 0 auto;
}

#qa_title h2::before {
    content: "";
    display: block;
    width: 4rem;
    height: 4rem;
    background: red;
    position: absolute;
    z-index: -1;
    top: -10px;
    left: 0px;
}

#qa_title h2 {
    font-size: 60px;
    font-weight: 300;
    background: #fff;
    padding: 0 15px;
    line-height: 60px;
    position: relative;
    text-align: left;
}
.accordions .accordion-content{
    margin: 10px 0;
    border-radius: 4px;
    /* background: #FFF7F0; */
    border-bottom: 1px solid #FFD6B3;
    overflow: hidden;
    max-height: 45px;
}

.accordion-content header i:hover{
    color: red;
}
.accordion-content header .title:hover{
    color: red;
}

.accordion-content.open{
    padding-bottom: 10px;
    max-height: 100% !important;
}
.accordion-content header{
    display: flex;
    min-height: 50px;
    padding: 0 15px;
    cursor: pointer;
    align-items: center;
    justify-content: flex-start;
    transition: all 0.2s linear;
    flex-direction: row;
}
.accordion-content.open header{
    min-height: 35px;
}
.accordion-content header .title{
    font-weight: 500;
    color: #333;
    padding-left: 10px;
    font-size: 16px;
}
.accordion-content header i{
    font-size: 15px;
    color: #333;
}
.accordion-content .description{
    height: 0;
    font-size: 12px;
    color: #333;
    font-weight: 400;
    padding: 0 15px;
    transition: all 0.2s linear;
}

.qa-paragraf {
    width: 75%;
    margin: 0 auto 80px;
}

</style>

@endsection

@section('master')

<!-- Breadcrumb -->
@include('front.includes.breadcrumb')
<!-- Breadcrumb End-->

<section class="faq my-5">
    <div class="container">
        <div class="row">
            <div class="faq-image">
                <img src="{{ $page->media_id ? $page->img_paths['medium'] : null }}" class="m-auto d-block" alt="{{$page->breadcrumb_title}}">
            </div>
        </div>
        <div class="fusion-text heading-box my-5" id="qa_title"><h2>{{$page->breadcrumb_title}}</h2></div>
        {{-- <h2 class="section-heading">{{$page->breadcrumb_title}}</h2> --}}
        <p class="qa-paragraf">
            {!!$page->meta_description !!}
        </p>
        <div class="accordions">
            @foreach ($faqs as $faq )
            <div class="accordion-content">
                <header>
                    <i class="fa-solid fa-plus"></i>
                    <span class="title">{{ $faq->question }}</span>
                </header>
                <div class="description">
                    {!!$faq->answer !!}
                </div>
            </div>
            @endforeach

        </div>
    </div>
  </section>

@endsection

@section('footer')
<script>
     const accordionContent = document.querySelectorAll(".accordion-content");

accordionContent.forEach((item, index) => {
    let header = item.querySelector("header");
    header.addEventListener("click", () =>{
        item.classList.toggle("open");

        let description = item.querySelector(".description");
        if(item.classList.contains("open")){
            description.style.height = `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
            item.querySelector("i").classList.replace("fa-plus", "fa-minus");
        }else{
            description.style.height = "0px";
            item.querySelector("i").classList.replace("fa-minus", "fa-plus");
        }
        removeOpen(index); //calling the funtion and also passing the index number of the clicked header
    })
})

function removeOpen(index1){
    accordionContent.forEach((item2, index2) => {
        if(index1 != index2){
            item2.classList.remove("open");

            let des = item2.querySelector(".description");
            des.style.height = "0px";
            item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
        }
    })
}

</script>
@endsection
