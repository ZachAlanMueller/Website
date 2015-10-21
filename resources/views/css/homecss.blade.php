
/*    
    Colors:
        Background: #26596A
        Title-Background: #6C939F
        Content-Background: #6C939F
        Title/Content Border: #022835
        Side/Topbar Base Color: #022835
        Side/Top Border Color: #069ED0
        
*/
html, #body {
  
  margin: 0;
  padding: 0;
  background: #26596A; 
  height: 100%;
}

#description {
    background-color: #AA7339;
    border-style: groove;
    border-color: #36200A;
    border-width: 5px;
    margin-right: 440px;
    margin-left: 440px;
    padding: 20px;
    color: #000000; 
    text-align: center;
    text-decoration: underline;
    
}
.paragraph {
    background-color: #AA7339;
    border-style: groove;
    border-color: #36200A;
    border-width: 5px;
    font-size: large;
    padding: 20px;
    margin-left: 350px;
    margin-right: 180px;
}

.buttons {
  position: absolute;
  top: 75px;
  left: 25px;
}

/*------------Animation for Hover------------*/

@-webkit-keyframes pulse {
  50% {
    background-color: #AA7339;
  }
}

@keyframes pulse {
  50% {
    background-color: #AA7339;
  }
}




/*------------Top Bar------------*/
#nav ul {
  list-style: none;
  background-color: #022835;            /*Sidebar color (not button)*/
  text-align: center;
  padding: 0;
  margin: 0;
  border-bottom: groove;
  border-width: 4px;
  border-color: #069ED0;

}
#nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  border-bottom: 1px solid #888;
  background-color: url({{ URL::asset('images/transparentBackground.jpg'); }}); /*#022835;*/
}
 
#nav a {
  text-decoration: none;
  color: #fff;
  display: block;
  transition: .8s;
}
 
 
#nav li {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
#nav li:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #2098d1;
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
  -webkit-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}

#nav li:hover:before, #nav li:focus:before, #nav li:active:before {
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}


/*------------Side Bar------------*/
#sidenav ul {
  float: right;
  list-style: none;
  text-align: center;
  padding: 10px;
  margin: 0px;
  margin-right: 10px;
  position: absolute;
  top: 125px;
  right: 0px;
}
#sidenav li {
  font-weight: bold;
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  height: 40px;
  padding-top: 3px;
  padding-bottom: 3px;
}
 
#sidenav a {
  text-decoration: none;
  color: rgba(255, 255, 255, .1);
  display: block;
  transition: .25s;
}
 
#sidenav a:hover {
  color: #FFFFFF
}
 
/*------------Image------------*/
.image {
    position: absolute;
    top: 150px;
    border: groove;
    border-width: 20px;
    margin: 20px;
    border-color: #080E0F;
    
}
img {
    vertical-align: top;
}
/*------------  ------------*/

 
@media screen and (min-width: 600px) {
    #nav li {
        width: 120px;
        border-bottom: none;
        height: 50px;
        line-height: 50px;
        font-size: 1.4em;
    }
 

    #nav li {
        display: inline-block;
        margin-right: -4px;
    }
}
