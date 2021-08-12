const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox =  document.querySelector(".chat-box");


form.onsubmit = (e) =>
{
    e.preventDefault();
}


sendBtn.onclick = () =>
{
        // lets started ajax
        let xhr = new  XMLHttpRequest();  // creating xml request
        xhr.open("POST","php/insert-chat.php",true);
        xhr.onload = () => 
        {
            if (xhr.readyState === XMLHttpRequest.DONE ) 
            {
                if (xhr.status === 200) 
                {
                    inputField.value = "";  // once mesage inseteed into dbb then leave bllankk
                    scrollToBottom();

                }    
            }
        }
        // we send the form data through ajax to php
        let formData = new FormData(form);  //==== creating new form data object ===
        xhr.send(formData);  //=== sending the data to php ===   
}


chatBox.onmouseenter = () =>
{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () =>
{
    chatBox.classList.remove("active");
}


setInterval(() => 

        {

       // lets started ajax
       let xhr = new  XMLHttpRequest();  // creating xml request
       xhr.open("POST", "php/get-chat.php",  true);
       xhr.onload = () => 
       {
           if (xhr.readyState === XMLHttpRequest.DONE ) 
           {
               if (xhr.status === 200) 
               {
                   let data = xhr.response;
                   chatBox.innerHTML = data;
                   if(!chatBox.classList.contains("active"))
                   {
                        scrollToBottom();
                   }

               }    
           }
       }
 // we send the form data through ajax to php
   let formData = new FormData(form);  //==== creating new form data object ===
   xhr.send(formData);  //=== sending the data to php ===
  
}, 500);  // thhiis uunctiioon wiill run frreeqquuettly  aftterr  500ms  

function scrollToBottom()
{
    chatBox.scrollTop = chatBox.scrollHeight;
}
