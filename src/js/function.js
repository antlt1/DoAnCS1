function getlenght()
{
  var width = document.getElementById('foo').offsetWidth;
  if(width <= 360)/* thiết bị di động*/
  {
    document.getElementById("computer").style.display = "none";
    document.getElementById("div-btn").style.display = "block";
  }else if(width <= 420 && width > 360 )
{
}else
{
    document.getElementById("mobile").style.display = "none";
}
  
}
/* hàm ẩn hiện thanh search mobile*/
function search()
{
  var width = document.getElementById('foo').offsetWidth;
  var display = document.getElementById("mobile").style.display ;
  if(width <= 360 && display == "none")
  {
    document.getElementById("mobile").style.display = "inline-block";
  }else if (width <= 360 && display != "none")
  {
    document.getElementById("mobile").style.display = "none";
  }
  
}