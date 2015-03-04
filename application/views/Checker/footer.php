    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#search-schedule',function(e){
                e.preventDefault();
                var elem = $(this);
                var current_val = elem.val();
                var theDayValue = current_val.split('<->',2);
                // console.log(theDayValue[1]);
                var table = $('#search-table tbody tr');

                $(table).show(50);

                if(current_val == 'All'){
                    // $(table).removeClass('hidden');
                    $(table).show(50);
                    return true;
                }

                $.each(table, function(index, val) {
                     
                    var elem = $(this);
                    var elemDay = elem.find('td.day').text();
                    var elemTime = elem.find('td.time').text();
                   

                    // console.log(elemTime);
                    // console.log(elemDay);
                    // console.log(theDayValue[0]);
                    // console.log(theDayValue[1]);
                    // console.log('---');

                    if( elemDay == theDayValue[0] && elemTime == theDayValue[1] ){

                    }else{
                       // $(elem).addClass('hidden');
                       $(elem).hide(120);
                    }
                });
            });
        });
    </script>

</body>
</html>
