function isElementVisible($elementToBeChecked)
{
    var TopView = $(window).scrollTop();
    var BotView = TopView + $(window).height();
    var TopElement = $elementToBeChecked.offset().top;
    var BotElement = TopElement + $elementToBeChecked.height();
    return ((BotElement <= BotView) && (TopElement >= TopView));
}

function count()
{
	$(".counter").each(function() {
		isOnView = isElementVisible($(this));
		var countTo = $(this).attr('data-count');
		if(isOnView && (!$(this).hasClass('started') || parseInt($(this).text()) < countTo)){
			$(this).addClass('started');
			var $this = $(this);
			countDur = parseInt($this.attr('data-duration')) || 4000;
			$({ countNum: $this.text()}).animate({
			countNum: countTo
			},
		
			{
		
			duration: countDur,
			easing:'linear',
			step: function() {
				$this.text(Math.floor(this.countNum));
			},
			complete: function() {
				$this.text(this.countNum);
			}
		
			});
		}
	});
}

$(window).scroll(count);
$(document).ready(() => {
    setTimeout(count, 500);
});