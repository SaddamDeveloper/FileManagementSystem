var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}
function withDecimal(n) {
    var nums = n.toString().split('.')
    var whole = inWords(nums[0])
    if (nums.length == 2) {
        return whole;
    }
}
function capitalizeFirstLetter(string) {
    return withDecimal(string.charAt(0).toUpperCase() + string.slice(1));
}
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

$(document).ready(function() {
var invoicerows = 1;
  $('input').click(function(){
    $(this).select();
  });
if ($(".delete").length < 2) $(".delete").hide();
  $("#addrow").click(function(){
    invoicerows++;
    i=invoicerows;
    $(".item-row:last").after('<tr class="item-row"><td>'+i+'</td><td class="item-name"><div class="delete-wpr"><input type="text" readonly value="9982134" id="sac'+i+'"><a class="delete" href="javascript:;" title="Remove row"><img src="images/cross.png" width="12px"></a></div></td><td><textarea placeholder="Description" id="description'+i+'"></textarea></td><td><textarea class="pos" id="pos'+i+'" placeholder=""></textarea></td><td><textarea class="amount" id="amount'+i+'" placeholder="₹ 0.00" onkeypress="return isNumberKey(event,this)"></textarea></td></tr>');
    if ($(".delete").length > 0) $(".delete").show();
  });
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
  // $("#date").val(print_today());
 $(document).on('keyup', '.amount', function(){
        calculations();
});
 $(document).on('click', '.delete', function(){
      $(this).parents('.item-row').remove();
      if ($(".delete").length < 2) $(".delete").hide();
      invoicerows--;
        calculations();
});
  $(document).on('keyup', '#sgstRate', function(){
        calculations();
});
   $(document).on('keyup', '#cgstRate', function(){
        calculations();
});
  $(document).on('keyup', '#less_advance', function(){
		calculations();
  });
    validateFields();

  $('#savenprint').one('click', function(){
     $(this).attr('disabled','disabled').css('opacity', '0.4');
        var form_data = [];
        var mainObj = {};
        mainObj['obj'] = {};
        mainObj['obj2'] = {};
        for(i = 1; i<=invoicerows; i++){
          mainObj['obj'][i] = { sac: $('#sac'+i).val(), description: $('#description'+i).val(), pos: $('#pos'+i).val(), invoice_no: $('#invoice_no').val()};
          form_data.push(mainObj);
        }
        d1 = $('#date').val();
        var day = d1.slice(0,2);
        var month = d1.slice(3,5);
        var year = d1.slice(6,10);
        var formattedDate = year+'-'+month+'-'+day;
        mainObj['obj2'] = {bill_to: $('#customer-title').val(), gstin: $('#gstin').val(), invoice_no: $('#invoice_no').val(), date: formattedDate, taxable_value: $('#taxable_value').val(), total_tax: $('#total_tax').val(), total_invoice_amount: $('#total_invoice_amount').val(), advance_amount: $('#less_advance').val()};
        $.ajax({
          url:'invoice_data.php',
          type: 'POST',
          data: { data : JSON.stringify(mainObj)},
          dataType: 'JSON',
          async: false,
          success: function(feedback){
            if(feedback == 0){
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1500
                });
                Toast.fire({
                  type: 'success',
                  title: 'Saved successfully'
                });
              // window.print();
              location.reload();
            }
            $('.description').val('');
            $('.pos').val('');
            $('.amount').val('');
            $('.bill_to').val('');
          }
        });
    }); 
       
  function invoice_no(){
    $.ajax({
      url: 'count.php',
      type: 'POST',
      success: function(feedback){
        $('#invoice_no').val(feedback);
      }
    });
  }
  invoice_no();
    $( function() {
    $( "#date" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
  
  $('#generatePDF').click(function(){
	  PDFFromHTML();
  });

});
function PDFFromHTML() {
  var pdf = new jsPDF('p', 'pt', 'A4');
	var bill_to = $('#bill_to').val();
	var invoice_no = $('#invoice_no').val();
	var date = $('#date').val();
	var gstin = $('#gstin').val();
	var amount = $('#net_invoice_amt').val();
  var advance = $('#less_advance').val();
  var address = $('#address').text();
  var bill_to = $('#customer-title').val();
	pdf.text('RECEIPT', 250, 20);
  pdf.setFontSize(9);
  pdf.setFontType("bold");
  pdf.text('Name & Address of Service Provider:', 50, 40);
  var formatedAddress = pdf.splitTextToSize(address, 180);
  pdf.text(formatedAddress, 50, 50);
  pdf.text('Received with Thanks from ' + bill_to, 50, 110);
  pdf.text('With Rupees: ' + amount + ' by Cash/RTGS/NEFT/Credit', 50, 130);

	 pdf.autoTable({
        head: [['INVOICE NO', 'GSTIN', 'DATE', 'AMOUNT', 'ADVANCE']],
        body: [
            [invoice_no, gstin, date, amount, advance]
        ],
        margin: {right:60,left:50, top:140},
    });
    pdf.text('Thank you for your keen interest on us!', 180, 200);
      $.ajax({
      url: 'count.php',
      type: 'POST',
      success: function(feedback){
        $('#invoice_no').val(feedback);
        console.log(feedback);
	       pdf.save(feedback+'.pdf');
      }
    });
}
 function calculations(){
	    var amount = 0.0;
        var sgst=0.00;
        var cgst=0.00;
        var gst=0.00;
        var total=0.00;
        var advance=0.00;
        var net_invoice_amt=0.00;
        var invoiceval = '';
        var total_invoice_amount=0.0;
          $('.amount').each(function(){
              var added=0;
              if($(this).val().length!=0){
                added=$(this).val();
              }
              amount = parseFloat(amount) + parseFloat(added);
              sgst=0.01*parseFloat($('#sgstRate').val())*parseFloat(amount);
              cgst=0.01*parseFloat($('#cgstRate').val())*parseFloat(amount);
              gst=parseFloat(cgst)+parseFloat(sgst);
              total=parseFloat(amount)+parseFloat(gst);
              if($('#less_advance').val().length==0) $('#less_advance').val('0');
              advance=parseFloat($('#less_advance').val());
              net_invoice_amt=parseFloat(total)-parseFloat(advance);
          });
          $('#taxable_value').val(amount.toFixed(2));
          $('#sgst').val(sgst.toFixed(2));
          $('#cgst').val(cgst.toFixed(2));
          $('#total_tax').val(gst.toFixed(2));
          var total_invoice_amount = $('#total_invoice_amount').val(total.toFixed(2));
          var totalInvoice = total_invoice_amount.val();
          $('#net_invoice_amt').val(net_invoice_amt.toFixed(2));	 
          $('#invoiceval').val(withDecimal(totalInvoice).charAt(0).toUpperCase() + withDecimal(totalInvoice).slice(1)); 
          $('#netinvoice').val(withDecimal(net_invoice_amt.toFixed(2)).charAt(0).toUpperCase() + withDecimal(net_invoice_amt.toFixed(2)).slice(1)); 
 }
function validateFields(){
    $('.requiredField').blur(function(){  

        if($(this).val().length != 0){

            $('#savenprint').attr("disabled", false).css('opacity', '1');
        }
        else{
          $(this).css('background', '#FFA07A');
        }
    });
}
function isNumberKey(evt, obj) {

            var charCode = (evt.which) ? evt.which : event.keyCode
            var value = obj.value;
            var dotcontains = value.indexOf(".") != -1;
            if (dotcontains)
                if (charCode == 46) return false;
            if (charCode == 46) return true;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }



