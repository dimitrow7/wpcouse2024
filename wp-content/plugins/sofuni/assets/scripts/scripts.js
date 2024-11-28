// JavaScript file
// console.log( 'hi, the file loads' );
jQuery(document).ready(function($) {
$('.like').on('click', function(e){
e.preventDefault();
console.log( 'clicked' ); // just to be sure
let job_id = jQuery(this).attr('data-id') // we'll need this later
console.log (job_id)
jQuery.ajax({
type: 'post',
dataType: 'json',
url: my_ajax_object.ajax_url,
data: {
action:'service_item_like', // PHP function
job_id: job_id,
},
success: function(msg){
console.log(msg);
}
});
});
});