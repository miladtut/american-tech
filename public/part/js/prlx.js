if ( $(window).width() > 992) {   

    $(".page-header").mousemove(function(e) {
        parallaxIt(e, "#bg-art-e3", -180);
        parallaxIt(e, "#bg-art-e2", -120);
        parallaxIt(e, "#bg-art-e1", -40);
      });
    
      function parallaxIt(e, target, movement) {
        var $this = $("#header-content");
        var relX = e.pageX - $this.offset().left;
        var relY = e.pageY - $this.offset().top;
      
        TweenMax.to(target, 1, {
          x: (relX - $this.width() / 2) / $this.width() * movement,
          y: ((relY - $this.height() / 2) / $this.height() * movement) + 100
        });
      }
  } 
  else {
    
  }
