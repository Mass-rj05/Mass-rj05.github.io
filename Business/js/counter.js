var x=0;
var y=0;
var z=0;
function counter()
{ 
  
    var first = $('.first');
    var secound = $('.secound');
    var thrid = $('.thrid');
    if(x<100)
    {
        x++;
        first.html(x);
        setTimeout(counter, 150);
    }
    if(y<1231)
    {
        y++;
        secound.html(y);
        setTimeout(counter, 50);
    }
    if(z<120)
    {
        z++;
        thrid.html(z);
        setTimeout(counter, 150);
    }

  
}
