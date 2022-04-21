//jquery functie voor het automatisch invullen van het e-mail veld na invullen van de naam
jQuery('.form-select').change(function() {
    var parent = $(this).parent();
    var postID = $(parent).data('form-email');

    document.getElementById("form-email").value = jQuery(this).val();
});


//functie voor de huidige datum
//functie om geen datum te kunnen kiezen uit het verleden
var today = new Date(Date.now() + (3600 * 1000 * 24)); //telt bij de dag van vandaag 24 uur bij
var day = today.getDate();
var month = today.getMonth()+1; //Januari is 0 dus moet er +1 om er 1 te maken
var year = today.getFullYear(); 

if(day<10){
  day='0'+day
} 
if(month<10){
  month='0'+month
} 

today = year+'-'+month+'-'+day;
document.getElementById("datumAfspraak").setAttribute("min", today);
document.getElementById('datumAfspraak').value = today;


// $(function(){
//   $("#contact-form").submit(function(e){
//     e.preventDefault();

//     $form = $(this);

//     $.post(document.location.url, $(this).serialize(), function(data){
//       $feedback = $("<div>").html(data).find(".form-feedback").hide();
      
//       $form.prepend($feedback)[0].reset();
//       $feedback.fadeIn(1500);
//       $feedback.fadeOut(3000);
//     });
//   });
// });