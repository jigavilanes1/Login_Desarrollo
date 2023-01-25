function GuardarActualizar() {
    let id = document.querySelector("#id").value;
    let nombre = document.querySelector("#nombre").value;
    let precio = document.querySelector("#precio").value;
    let marca = document.querySelector("#marca").value;
    let foto = document.querySelector("#foto").value;
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"id":id,"nombre":nombre,"precio":precio,"marca":marca,"foto":foto,"operacion":"Guardar"});

    xhr.send(data);
    setInterval("location.reload()",800);
}

function BuscarTodos() {
    let datos = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            datos.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarTodos"});

    xhr.send(data);
}

function Eliminar(id) {
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Eliminar"});

    xhr.send(data);
    setInterval("location.reload()",800);
}

function BuscarPorId(idP) {
    let id = document.querySelector("#id");
    let nombre = document.querySelector("#nombre");
    let precio = document.querySelector("#precio");
    let marca = document.querySelector("#marca");
    let foto = document.querySelector("#foto");    
    
    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(this.responseText);
            id.value = data[0].ID;
            nombre.value = data[0].NOMBRE;
            precio.value = data[0].PRECIO;
            marca.value = data[0].MARCA;
            foto.value = data[0].FOTO;
        }
    }

    let data = JSON.stringify({"id":idP,"operacion":"BuscarPorId"});

    xhr.send(data);
}

function Login() {
    let usuario = document.querySelector("#usuario").value;
    let password = document.querySelector("#password").value;    
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let mensaje = this.responseText;
            if(mensaje == "Correcto") {
                window.location.href = "Productos.php";
            } else {
                res.innerHTML = this.responseText;
            }                        
        }
    }
    
    let data = JSON.stringify({"usuario":usuario,"password":password,"operacion":"Login"});

    xhr.send(data);    
}

function Registrar() {
    let usuario = document.querySelector("#usuario").value;
    let password = document.querySelector("#password").value;    
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            alert(this.responseText);
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"usuario":usuario,"password":password,"operacion":"Registrar"});

    xhr.send(data);
    setInterval("location.reload()",800);
}