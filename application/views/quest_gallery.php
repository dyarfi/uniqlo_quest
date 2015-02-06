<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
//print_r($questionnaires);
?>
<div>

  <h4>Questionnaires Result</h4>

  <form class="form-horizontal">
      <select name="quests" id="index_quest" class="form-control"/>
            <option>----- PILIH -----</option>            
            <?php 
            $i=1;
            foreach($questionnaires as $questionnaire) { ?>
              <option data-rel="<?php echo strip_tags($questionnaire->questionnaire_text);?>" value="<?php echo $questionnaire->id;?>" <?php echo ($i==1 ? '' : '');?>>
                <?php echo strip_tags($questionnaire->questionnaire_text);?>
              </option>
            <?php 
            $i++;
            }
            ?>
      </select>
  </form>  

  <div id="chart2" style="padding:250px 0px;margin:40px 0; clear: both; position: relative;"></div>

</div>

<script>
$(document).ready(function(){
  jQuery.jqplot.config.enablePlugins = true;
  $('#index_quest').change(function() {      

      var inti = new Array();
      inti.push([0, 0, 0]);
      var plot2 = $.jqplot('chart2', inti, null);
      plot2.destroy();
      
      var quest_id   = $(this).val();
      var quest_text = $('option:selected').attr('data-rel');
      
      // Our ajax data renderer which here retrieves a text file.
      // it could contact any source and pull data, however.
      // The options argument isn't used in this renderer.
        var ajaxDataRenderer = function(url, plot, options) {
        var ret = null;
        $.ajax({
          // have to use synchronous here, else the function 
          // will return before the data is fetched
          async: false,
          url: url,
          dataType:"json",
          sortData:true,
          success: function(data) {
            ret = data;
          }
        });
        return ret;
      };
     
      // The url for our json data
      var jsonurl = '<?php echo base_url("quest");?>/gallery/' + quest_id;
     
      // passing in the url string as the jqPlot data argument is a handy
      // shortcut for our renderer.  You could also have used the
      // "dataRendererOptions" option to pass in the url.
      /*
      var plot2 = $.jqplot('chart2', jsonurl,{
        title: "AJAX JSON Data Renderer",
        dataRenderer: ajaxDataRenderer,
        dataRendererOptions: {
          unusedOptionalUrl: jsonurl
        }
      });
      */
      //jQuery.jqplot('chart2').replot();
      //var plot0 = jQuery.jqplot('chart2',jsonurl);
      //plot0.destroy();

      var plot1 = jQuery.jqplot('chart2',jsonurl,
        {
            title: quest_text,
            dataRenderer: ajaxDataRenderer,            
            grid: {
              drawBorder: false,
              drawGridlines: false,
              background: '#ffffff',
              shadow:false
            },
            seriesDefaults: {
              shadow: false,
              renderer: jQuery.jqplot.PieRenderer,
              rendererOptions: { padding: 2, sliceMargin: 2, startAngle: -90, showDataLabels: true }
            },
            legend: { show:true, location: 'w', rowSpacing:2, placement:"outsideGrid", border:"0px",fontSize:'1.0em'},
        }
      );
  }); 
});
</script>