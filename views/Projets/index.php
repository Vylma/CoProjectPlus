<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script> 

<ul class="tabmenu"> 
    <li onclick="getTable('en_cours')"><a class="tab" id="en_cours">EN COURS</a></li> 
    <li onclick="getTable('en_pause')"><a class="tab" id="en_pause">EN PAUSE</a></li> 
    <li onClick="getTable('achevé')"><a class="tab" id="achevé">ACHEVÉS</a></li> 
    <li onClick="getTable('non_lancé')"><a class="tab" id="non_lancé">NON LANCÉS</a></li>
</ul> 

<div id="content"></div>

<script>
        $(document).ready(function() {
            getTable('en_cours');
        });
        
        function getTable(id) {
            $('.tab').removeClass('active');
            $('#' + id).addClass('active');
            var etat_projet = id;
            $("#content").html('<img class="loader" src="images/ajax-loader.gif"/>');
            $.ajax({
                url: '/projets/get_table',
                type: 'POST',
                data: {'etat': etat_projet},
                success: function(data) {
                     $('#content').html(data);
                }
            });
        }
</script>