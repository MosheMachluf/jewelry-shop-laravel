String.prototype.permalink = function () {
    return this.trim().toLowerCase().replace(/\s+/g, "-");
};

$(".to-permalink").on("focusout", function () {
    $(this).val($(this).val().permalink());
});

$("#article-field").summernote({
    height: "300px",
});

$('.ui.accordion').accordion();
