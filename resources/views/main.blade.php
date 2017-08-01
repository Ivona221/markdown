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
    <textarea class="form-control" rows="5" cols="50" id="comment"></textarea>
</div>

<div class="form-group" style="width:40%; margin:20px; float:right;  display:inline-block;">
    <label for="comment">Converted text:</label>
  <div id="text" style="border:1px solid darkred;"></div>
</div>

    <div id="trial"><p>Hello</p></div>
    <ul id="myList"></ul>
</div>
<button id="convert" onClick="myFunction()">Convert</button>

<script>
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