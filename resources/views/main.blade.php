<!doctype html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<div id="main" style=" width:100%">
<div class="form-group" style="width:40%; margin:20px; display:inline-block;">
    <label for="comment">Enter your text:</label>
    <textarea  rows="5" cols="50" id="comment" onkeyup="myFunction1()" value=""></textarea>
</div>

<div class="form-group" style="width:40%; margin:20px; float:right;  display:inline-block;">
    <label for="comment">Converted text:</label>
    <textarea id="text2" class="form-control" rows="5" cols="50"></textarea>
  <div id="text" style="border:1px solid darkred;" contenteditable="true"></div>
</div>



</div>


<script>
var text='';
    $('#comment').keydown( function(e) {




        if(/~(.*?)~/gi.test(this.value)||/\*(.*?)\*/gi.test(this.value)||
            /_(.*?)_/gi.test(this.value)||/(#+)(.*?)[\n\r]/gi.test(this.value)){

            text=this.value.replace(/~(.*?)~/gi, '<span style="text-decoration:line-through">$1</span>')
                .replace(/\*(.*?)\*/gi, '<span style="font-style: italic">$1</span>')
                .replace(/_(.*?)_/gi, '<span style="font-style: italic">$1</span>')
                .replace(/(#+)(.*?)[\n\r]/gi,  function(match, capture, capture2){return '<h'+capture.length+'>'+capture2+'</h'+capture.length+'>'});
        }





        else text=this.value;


            $('#text').empty().append(text);

    });



    /*$('#comment').keyup(function() {
        var typedTextArray = $(this).val().split(/\s/g),
            typedTextDisplay = [];

        $(typedTextArray).each(function(index, elem){
            switch(elem){
                case '.-': typedTextDisplay.push('a'); break;
                case '-...': typedTextDisplay.push('b'); break;
                case '-.-.': typedTextDisplay.push('c'); break;
                case '-..': typedTextDisplay.push('d'); break;
                case '.': typedTextDisplay.push('e'); break;
                case '..-.': typedTextDisplay.push('f'); break;
                case '--.': typedTextDisplay.push('g'); break;
                case '....': typedTextDisplay.push('h'); break;
                case '..': typedTextDisplay.push('i'); break;
                case '.---': typedTextDisplay.push('j'); break;
                case '-.-': typedTextDisplay.push('k'); break;
                case '.-..': typedTextDisplay.push('l'); break;
                case '--': typedTextDisplay.push('m'); break;
                case '-.': typedTextDisplay.push('n'); break;
                case '---': typedTextDisplay.push('o'); break;
                case '.--.': typedTextDisplay.push('p'); break;
                case '--.-': typedTextDisplay.push('q'); break;
                case '.-.': typedTextDisplay.push('r'); break;
                case '...': typedTextDisplay.push('s'); break;
                case '-': typedTextDisplay.push('t'); break;
                case '..-': typedTextDisplay.push('u'); break;
                case '...-': typedTextDisplay.push('v'); break;
                case '.--': typedTextDisplay.push('w'); break;
                case '-..-': typedTextDisplay.push('x'); break;
                case '-.--': typedTextDisplay.push('y'); break;
                case '--..': typedTextDisplay.push('z'); break;
            }
        });
        console.log(typedTextDisplay);
        $('#t').html(typedTextDisplay.join(''));
    });*/


var counter=0;
    function myFunction(){
        var text=document.getElementById('comment').value;
        var div=document.getElementById('text');


        var all='';
       for(var i=counter;i<=text.length;i++){

           if(text.charAt(i)=='#'){
               var number=1;
               while(text.charAt(i)=='#'){
                   number++;
                   i++;
               }
               var innerText="";
               while(text.charAt(i)!='\n' && i<=text.length){
                   innerText+=text.charAt(i).toString();

                   i++;
               }

               var node = document.createElement("H"+number);
               var textnode = document.createTextNode(innerText);
               node.appendChild(textnode);
               div.appendChild(node);
               number=1;

           }


           if(text.charAt(i)=='_'){
               i++;
               var innerText="";
               while(text.charAt(i)!='_'){
                   innerText+=text.charAt(i).toString();
                   i++;
               }
               i++;
               var node = document.createElement("I");
               var textnode = document.createTextNode(innerText);
               node.appendChild(textnode);

               div.appendChild(node);

           }

           if(text.charAt(i)=='~'){
               i++;
               var innerText="";
               while(text.charAt(i)!='~'){
                   innerText+=text.charAt(i).toString();
                   i++;
               }
               i++;
               var node = document.createElement("P");
               var textnode = document.createTextNode(innerText);
               node.style.textDecoration='line-through'; 
               node.appendChild(textnode);
                  
              div.appendChild(node);
           }

           if(text.charAt(i)=='\n'){
             var break1=document.createElement("BR");
             div.appendChild(break1);

           }




div.innerHTML+=text.charAt(i);


           }

counter=i;
       }






</script>
</body>
</html>