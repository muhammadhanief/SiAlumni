function initAcc(elem, option){
    document.addEventListener('click', function (e) {
        if (!e.target.matches(elem+' .a-btn')) return;
        else{
            if(!e.target.parentElement.classList.contains('active')){
                if(option==true){
                    var elementList = document.querySelectorAll(elem+' .a-container');
                    Array.prototype.forEach.call(elementList, function (e) {
                        e.classList.remove('active');
                    });
                }            
                e.target.parentElement.classList.add('active');
            }else{
                e.target.parentElement.classList.remove('active');
            }
        }
    });
}

initAcc('.accordion', false);


var selector = document.querySelector('.navbar-toggle');
var menu = selector.parentNode.querySelector('.navbar-links');

selector.addEventListener('click', () => {
  menu.classList.toggle('active');
});

window.addEventListener('click', function(e) {
  e.preventDefault();
  const container = selector.parentNode;
  const clickIsInContainer = container.contains(e.target) && container !== e.target;
  const clickIsInMenu = menu && menu.contains(e.target) && menu !== e.target;
  console.log(clickIsInContainer, clickIsInMenu, e.target)
  if (clickIsInContainer || clickIsInMenu) return;
  
  menu.classList.remove('active');
});