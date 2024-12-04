
<style>
   .banner-section 
   {
      height:200px;
      border:1px solid black;
      border-radius:5px;
      background-image:url('https://img.freepik.com/free-photo/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background_1258-28311.jpg?w=900&t=st=1694336396~exp=1694336996~hmac=7eaffc42524fe10b2d930700b5a019b98c8f02dede25d93411e5756157355e51');
      background-size:cover;
      background-repeat:no-repeat;
      color:white;   
   }
</style>
<!-- banner section  -->
<div class="container my-4">
   <div class="banner-section d-flex justify-content-center align-items-center">
       <h1>Status247.online</h1>
   </div>
</div>

<div class="container mt-5">
   <div class="d-flex justify-content-between align-items-center py-2">
      <h4 class="ml-0">Festival</h4>
      <div>
      <div class="btn-group" role="group" aria-label="Basic example">
         <button type="button" class="btn btn-outline-secondary prev">Previous</button>
         <button type="button" class="btn btn-outline-secondary next">Next</button>
      </div>
      </div>
   </div>
    <div class="row owl-carousel p-0 mx-0">
        <?php
         foreach($templates as $temp)
               {
               echo ' 
                     <div class=" mb-4">
                        <a href="view-poster/'.$temp->id.'">
                        <div class="card">
                           <img src="'.base_url().'assets/templates/'.$temp->template_img.'" alt="'.$temp->title.'" class="poster-thumbnail">
                        </div>
                        </a>
                     </div>
                     ';
               }  
          ?>

    </div>
</div>

<?php $this->load->view('components/footer'); ?>
<script>
    $(document).ready(function(){
       var owl =  $('.owl-carousel').owlCarousel({
            loop: true, // Enable loop
            margin: 10, // Space between items
            nav: false, // Show navigation buttons
            autoplay: true, // Enable autoplay
            autoplayTimeout: 3000, // Autoplay interval in milliseconds
            responsive:{
                0:{
                    items:1 // Number of items to display at different screen sizes
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });

         // Custom button event listeners
         $('.prev').click(function () {
                
                owl.trigger('prev.owl.carousel');
                
            });

            $('.next').click(function () {
                owl.trigger('next.owl.carousel');
            });
    });
</script>
