@extends('layouts.panel')

@section('title', 'Kegiatan Selesai')

@section('content')
<div class="row">
   <div class="col-md-8">
      <div class="card shadow-sm mb-3">
         <div class="card-header" data-card-widget="collapse">
            <h3 class="card-title">Kalender Kegiatan</h3>
            <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i> </button> </div>
         </div>
         <div class="card-body p-0">
            <div id="calendar"></div>
         </div>
      </div>
   </div>
   <div class="col-md-4 mb-3">
      <div class="card shadow-sm mb-3">
         <div class="card-header" data-card-widget="collapse">
            <h3 class="card-title">Kegiatan Mendatang</h3>
            <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i> </button> </div>
         </div>
         <div class="card-body p-0">
            <ul class="products-list product-list-in-card p-2">
               <li class="item mx-3">
                  <div class="product-img"> <img
                        src="https://lh3.googleusercontent.com/a-/AOh14GintouYNcTICAE3YesIM8ud8MBewzuoAj9cjvXjNQ"
                        alt="Ajeng S. W." class="img-size-50 img-circle"> </div>
                  <div class="product-info"> <a href="https://sikka.bempknstan.org/organisasi/user/MTEx"
                        class="text-dark product-title">Ajeng S. W.</a> <span class="product-description">
                        Staf </span> </div>
               </li>
               <li class="item mx-3">
                  <div class="product-img"> <img
                        src="https://sikka.bempknstan.org/assets/upload/profilepic/compressed_4301190096_1594453258.png"
                        alt="Aln Pujo Priambodo" class="img-size-50 img-circle"> </div>
                  <div class="product-info"> <a href="https://sikka.bempknstan.org/organisasi/user/MjM%3D"
                        class="text-dark product-title">Aln Pujo Priambodo</a> <span class="product-description">
                        Sekretaris-Bendahara (Staf) </span> </div>
               </li>
               <li class="item mx-3">
                  <div class="product-img"> <img
                        src="https://lh3.googleusercontent.com/a-/AOh14Gh77sPLZQk29hAfttBOK8T91PLoQEaq9GudLRnQyw"
                        alt="Alviana Fatin Ulya" class="img-size-50 img-circle"> </div>
                  <div class="product-info"> <a href="https://sikka.bempknstan.org/organisasi/user/Mzc%3D"
                        class="text-dark product-title">Alviana Fatin Ulya</a> <span class="product-description">
                        Bendahara (Staf) </span> </div>
               </li>
               <li class="item mx-3">
                  <div class="product-img"> <img
                        src="https://lh3.googleusercontent.com/a-/AOh14Gj4_F522PTFYzm8vdlgl7CbRBcIU2APk561Fo32Vw"
                        alt="Diah Karunia M P" class="img-size-50 img-circle"> </div>
                  <div class="product-info"> <a href="https://sikka.bempknstan.org/organisasi/user/MTU%3D"
                        class="text-dark product-title">Diah Karunia M P</a> <span class="product-description">
                        Kabiro (Staf) </span> </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
@endsection