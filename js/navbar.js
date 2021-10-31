
        var header = document.getElementById('header');
        var mobileMenu = document.getElementById('mobile-menu');
        var headerHeight = header.clientHeight;

        // khi click vào mở/đóng menu-mobile
        mobileMenu.onclick = function(){
            var isClosed = header.clientHeight === headerHeight;
            if(isClosed){
                header.style.height = 'auto';
            }else{
                header.style.height = null;
            }
        }

        // tự đóng menu khi chọn navbar
        var menuItems = document.querySelectorAll('.nav li a[href*="#"]');
        for (var i = 0; i < menuItems.length; i++){
            var menuItem = menuItems[i];
            
            menuItem.onclick = function(){
                header.style.height = null;
            }
        }
