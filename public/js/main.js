function togglesidenav() {
  //toggle sidenav with slide effect
  if ($('.sidenav').css('left') == '-250px') {
    $('.sidenav').animate({ left: '0px' }, 500);
  } else {
    $('.sidenav').animate({ left: '-250px' }, 500);
  }
}