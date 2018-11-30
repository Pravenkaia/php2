//функция построения объекта картинок

        make_photos = function(
            src_big,
            src_thumb,
            photo_name
            ) {
            this.src_big      = src_big;
            this.src_thumb    = src_thumb;
            this.photo_name   = photo_name;

        }
        
        // раз мы вручную формируем src, пусть будут и названия
        var imgs = new Array;
        var names = [
            'Здравствуте, участники!',
            'Этап гребли',
            'С байдарок на треккинг',
            'КП в водопаде',
            'КП на быках',
            'КП на быках, падун',
            'КП каньонинг',
            'Финиш',
            ''
        ];
        var src;
        for (var i = 0; i < 8; i++) {
            
            src = 'img/';
            
            imgs[i] = new  make_photos (
                
                src + i + '.jpg',
                src + i + '_.jpg',
                names[i]
                
            );
        }

        console.log(imgs);


//createPhoto, createThumbs


//  превьюшки id Thumbs
function createThumbs(idOfTeg)  {
    var i; 
    
    //if (divParent = document.getElementById('thumbs')) toReset(idOfTeg,'thumbs'); // удаляем элемент, если существует 
    
    toMakeElem ('div', 'thumbs', 'thumbs',idOfTeg,  '');
    
    //формируем из массива объектов картинок
    var img;
    for (i = 0; i < imgs.length; i++) {
        createImg('thumbs', 'img' + i, imgs[i]); 
    }
    

    console.log(document.getElementById(idOfTeg));
 
}


// большая картинка  id Photo

function createPhoto(idOfTeg)  {
    var i; 
    
    //if (divParent = document.getElementById('photo')) toReset(idOfTeg,'photo'); // удаляем элемент, если существует 
    
    toMakeElem ('div', 'photo', 'photo',idOfTeg,  '');
    
    //  делаем тег большой картинки
    createImg('photo', 'big', imgs[0]); 
    
    //  делаем тег подписи к  картине
    toMakeElem ('div', 'sign', 'sign','photo',  imgs[0].photo_name);
     
    
    // правая стрелка
    toMakeElem ('div', 'right_row', 'right_row','photo',  '');
    createImg('right_row', 'right', 'img/row_right.png'); 
    
    // левая стрелка
    toMakeElem ('div', 'left_row', 'right_row','photo',  '');
    createImg('left_row', 'left', 'img/row_left.png'); 
 
    console.log(document.getElementById(idOfTeg));
}




// функция создания картинки 

function createImg(
                    papa,    // id родителя
                    kid,    //id будущей картинки
                    imgObg  //объект картинки
                    )  {
    
    //if (divParent = document.getElementById('kid')) toReset(idOfTeg,'kid'); // удаляем элемент, если существует 
    
                // картинка
        toMakeElem ('img',kid, '', papa, '');
        this_img = document.getElementById(kid);
                        
        if (imgObg.src_big) {
            this_img.src = imgObg.src_big;  // создаем адрес картинки
            this_img.setAttribute('alt', imgObg.photo_name);  //атрибут создаем alt картинки
            this_img.setAttribute('title', imgObg.photo_name);  //атрибут создаем title картинки
        }
         else
           this_img.src = imgObg;

}



function toReset(papa,kid) {
    
    //удаление тега с id = kid, если уже есть
    if (papa && kid) {
    var toDelParent = document.getElementById(papa); // ищем родительский
    var toDel = document.getElementById(kid);  // ищем дочерний (созданный)
    
    if (toDelParent && toDelParent)
        toDelParent.removeChild(toDel); // удаляем дочерний (созданный)
    }
    return false;
    
}


function toMakeElem (
                    elem = 'div',       // тег (div и т.д.)
                    id_elem,    // id будущего елемента
                    class_elem, // class будущего елемента
                    papa = 'body',       // id родителя
                    text = ''       // содержимое тега
                    ) {
                        
    if (divParent = document.getElementById('id_elem')) toReset(idOfTeg,'id_elem'); // удаляем элемент, если существует 
    
    blocks = document.createElement(elem);
    if (class_elem != '') blocks.className = class_elem;
    if (id_elem != '') blocks.id = id_elem;
    blocks.innerHTML = text;
    
        
    // создаем корзину в документе 
    divParent = document.getElementById(papa); // ищем родительский
    divParent.appendChild(blocks);  //добавляем в родителя
                        
   
}


function what_img(id) {
    
    var teg = document.getElementById(id);
    var tegSrc = teg.src.split('/');
    
    var fName = tegSrc[tegSrc.length - 1];

    for (var i = 0; i < imgs.length; i++) {
       
        var imgsFile  = imgs[i].src_big.split('/') ;
        var bigName   = imgsFile[imgsFile.length - 1];

        var imgsThumb = imgs[i].src_thumb.split('/') ;
        var thumbName = imgsThumb[imgsFile.length - 1];
        
        if (fName == bigName || fName == thumbName) {
            return i;
        }
    }
    return false;
    
}

// по клику по thumb img
 function change_src(id) {
     
    var i;
    i = what_img(id);
     //console.log(i);
    if (i >= 0) {
        document.getElementById('big').src   = imgs[i].src_big;
        document.getElementById('big').alt   = imgs[i].photo_name;
        document.getElementById('big').title = imgs[i].photo_name;
        document.getElementById('sign').innerHTML = imgs[i].photo_name;
    }
    console.log (document.getElementById('big'));
 }



// по стрелкам
function change_src_row(id, n) {
    
    var i;
    i = what_img(id);
    //console.log(i);
    if (i >= 0) {
        i += n;
        if (i < 0)               i = imgs.length - 1;
        if (i > imgs.length - 1) i = 0;
    }
    else i = 0;
    
    document.getElementById(id).src   = imgs[i].src_big;
    document.getElementById(id).alt   = imgs[i].photo_name;
    document.getElementById(id).title = imgs[i].photo_name;
    document.getElementById('sign').innerHTML = imgs[i].photo_name;
     console.log (document.getElementById(id));
    
}

//  обработка событий по клику
document.getElementById('container').onclick=function fn(e) {
    e = e || event;
    var target = e.target || e.srcElement;
    var id = target.id;
    console.log('click по элементу: ',id);
    console.log('id.substring(0,3): ',id.substring(0,3));
    
    switch(id.substring(0,3)) {
        case 'img': 
            change_src(id); //  сменть src большой картинки
            break;
        case 'rig':
            change_src_row('big', 1); //  листать вправо
            break;
        case 'lef':
            change_src_row('big', -1); // листать влево
            break;
        case 'big': //по картинке
            change_src_row('big', 1); // листать вправо 
            break;
    }
    

}


