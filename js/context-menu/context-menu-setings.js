const contextMenu=document.getElementById('context-menu');
document.body.addEventListener('contextmenu', (event) => {
    event.preventDefault();

    const {clientX: mouseX, clientY: mouseY} = event;
    const {normalizedX,normalizedY}=normalizePosition(mouseX,mouseY);
    contextMenu.style.top = `${normalizedY}px`;
    contextMenu.style.left=`${normalizedX}px`;
    contextMenu.classList.remove('visible');
    setTimeout(()=>{
        contextMenu.classList.add('visible');
    },100);
});
document.body.addEventListener('click',(e)=>{
        contextMenu.classList.remove('visible');
   const stylingBody= document.body.style;
    const allElems = window.document.querySelectorAll("*");
    if(e.target.dataset.action=="make-smaller-size"){
    changeSize(allElems,-2);
}
    if(e.target.dataset.action=="make-bigger-size"){
        changeSize(allElems,+2);
    }
    if(e.target.dataset.action=="reset-settings"){
        location.reload();
    }
    if(e.target.dataset.action=="go-to-main"){
        location.href='index.php';
    }
    if(e.target.dataset.action=="change-mode"){
        const arrBodyElems=document.body.querySelectorAll("*");
       arrBodyElems.forEach((elem)=>{
        elem.style.filter='grayscale(100%)';
     })
    }

})

const normalizePosition=(mouseX,mouseY)=>{
    //compute what is the mouse position relative to the container element
    const{
        left:scopeOffsetX,
        top:scopeOffsetY,
    }=document.body.getBoundingClientRect();
   const scopeX=mouseX-scopeOffsetX;
   const scopeY=mouseY-scopeOffsetY;
   //check if the element will go out of bounds
   const outOfBoundsOnX=scopeX+contextMenu.clientWidth>document.body.clientWidth;
   const outOfBoundsOnY=scopeY+contextMenu.clientHeight>document.body.clientHeight;
   let normalizedX=mouseX;
   let normalizedY=mouseY;
    // normalize on X
if(outOfBoundsOnX){
    normalizedX=scopeOffsetX+document.body.clientWidth-contextMenu.clientWidth;
}
//normalize on Y
    if(outOfBoundsOnY){
        normalizedY=scopeOffsetY+document.body.clientHeight-contextMenu.clientHeight;
    }

return{normalizedX,normalizedY};
};
const changeSize=(elems,onSize)=>{
    elems.forEach((elem)=>elem.style.fontSize=parseInt(getComputedStyle(elem).getPropertyValue('font-size').replace('px',''))+onSize+"px");
}