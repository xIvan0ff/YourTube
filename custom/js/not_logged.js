let countDots = 0;
function updateText(element)
{
    element.text(element.text() + ".");
    if(countDots >= 2)
    {
        location.href = maindir;
    } else {
        setTimeout(updateText, 100, element);
        countDots++;
    }
}
$(document).ready(() => {
    setTimeout(updateText, 500, $('.not-logged'));
});