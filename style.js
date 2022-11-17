
      const signUpbutton=document.getElementById("signup");
      const signInbutton=document.getElementById("signin");
      const container=document.getElementById("container");
      signUpbutton.addEventListener('click',()=>{
          container.classList.add("right-panel-active");
      })
      signInbutton.addEventListener('click',()=>{
          container.classList.remove("right-panel-active");
      })
  