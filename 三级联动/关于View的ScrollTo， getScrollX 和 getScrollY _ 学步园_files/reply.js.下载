//@reply
jQuery(document).ready(function($){
$('.reply_t').click(function() {
var author = $(this).parents(".author_box").find("strong").text();
var id = '"#' + $(this).parents(".author_box").find(".t").attr("id") + '"';
$("#comment").attr("value","<a href=" + id + ">@" + author + " </a>: ").focus();
});
$('#cancel-comment-reply-link').click(function() {
$("#comment").attr("value","");
});
})