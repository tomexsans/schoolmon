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

                var table = $('#search-table tbody tr');

                $(table).show(1);

                if(current_val == 'All'){
                    // $(table).removeClass('hidden');
                    $(table).show(1);
                    return true;
                }

                $.each(table, function(index, val) {
                     
                    var elem = $(val);
                    var elemDay = elem.find('td.day').text();
                    var elemTime = elem.find('td.time').text();
                    var regexRes = testinput(current_val,elemDay);


                    if( regexRes ){

                    }else{
                       // $(elem).addClass('hidden');
                       $(elem).hide(1);
                    }
                });
            });
        });

        function testinput(re, str){
            var midstring;
            var regex = new RegExp(re,'i');
                if (regex.test(str)) {
                return true;
            } else {
                return false;
            }
            
            // console.log(str + midstring + regex.source);
            // console.log(str + midstring + regex);
            // console.log(regex.test(str));
            // console.log(str);
        }
    </script>

</body>
</html>
