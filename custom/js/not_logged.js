let count = 0;
function updateText(element)
{
    element.text(element.text() + ".");
    if(count >= 2)
    {
        location.href = maindir;
    } else {
        setTimeout(updateText, 100, element);
        count++;
    }
}
$(document).ready(() => {
    setTimeout(updateText, 500, $('.not-logged'));
});