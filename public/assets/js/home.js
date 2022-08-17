$( window ).on( "load", function() {
    getData();
    jQuery('body').on('click', '#refresh', function() {
      $('#loading').show();
      document.getElementById("list").innerHTML = "";
      getData();
    });
  });

  
  function getData() {
    var list = document.getElementById('list');
    var baseUrl = window.location.protocol + "//" + window.location.host + "/";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    })
    var type = "get";
    var ajaxurl = baseUrl + 'api/quotes';

    $.ajax({
      type: type,
      url: ajaxurl,
      dataType: 'json',
      success: function(allData) {

        $('#loading').hide();
        allData.forEach(myFunction);

        function myFunction(item) {
          var entry = document.createElement('li');
          entry.appendChild(document.createTextNode(item));
          list.appendChild(entry);
        }
        $("li").addClass("list-group-item");
        $("li").css("margin", "10px");

      },
      error: function(data) {
        $('#loading').val('Something Wrong');
      }
    });
  }