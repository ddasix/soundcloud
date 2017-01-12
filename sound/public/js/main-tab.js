  $(document).ready(function () {
      $(".tab-btn").click(function () {
          var tracks = $(this).attr("data-target") == "tracks"
          if (tracks) {
              $("#open-stage").removeClass("choose");
              $("#tracks").addClass("choose");
              $(".tab-btn").removeClass("choose");
              $(this).addClass("choose");
          } else {
              $("#tracks").removeClass("choose");
              $("#open-stage").addClass("choose");
              $(".tab-btn").removeClass("choose");
              $(this).addClass("choose");
          };
      })
  });
