jQuery(document).ready(function($) {
var wrapper         = $(".wpfl-container"); //Fields wrapper
var add_button      = $(".button-add"); 
var i = 1; //initial sequence number of a label 
var x = 1; //initial number for counter which create identifier

$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
        i++; x++;
        $(wrapper).append('<div class="label_num"><h3>Label '+ i +'</h3><table class="form-table">'+
    '<tbody>'+
        '<tr>'+
            '<th scope="row">'+
    '<label for="fl_stock_info_count'+ x +'">'+
        'Count of products not less then:</label></th>'+
        '<td><input type="number" name="label_stockinfo[count1]"'+
        'class="regular-text" id="fl_stock_info_count'+ x +'"></td></tr>'+
    '<tr> <th scope="row">'+
        '<label for="fl_stock_info_count2_'+ x +'">'+
        'Count of products not more then:</label></th>'+
        '<td><input type="number" name="label_stockinfo[count2]"'+
        'class="regular-text" id="fl_stock_info_count2_'+ x +'"></td></tr>'+
    '<tr><th scope="row"><label for="fl_stock_info_text'+ x +'">'+
        'Text for stock info label:</label></th>'+
        '<td><input type="text" name="label_stockinfo[text]"'+
        'class="regular-text" id="fl_stock_info_text'+ x +'"></td></tr>'+
        '</tbody>'+
'</table><input type="button" name="btn_del_label"' +
        'class="button-del" value="Delete stock info label" ></div>'); //add remove input
        // discard value of counter if only one label
        var count_label;
        count_label = document.getElementsByClassName('label_num').length;
        if(count_label == 1) {
            x = 1;
            }   
});
    
$(wrapper).on("click",".button-del", function(e){ //user click on remove text
    e.preventDefault(); 
    $(this).parent('div').remove(); i--;
});
});