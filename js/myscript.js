$(document).ready(function () {
    $("form").validate();
    $("#releasedate").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: "yy-mm-dd",
    });
    $("#showdate").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        minDate: 0
    });
});

function showMovies(genre) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getMovies.php?q=" + genre, true);
    xmlhttp.send();
}

function showShows(movie, type = '', admin = '') {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var outpuid;
            if (type == '') {
                outpuid = 'output';
            } else {
                outpuid = 'showid';
            }
            document.getElementById(outpuid).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getShows.php?q=" + movie + "&type=" + type + "&admin=" + admin, true);
    xmlhttp.send();
}

function showTimings(showid, type = '') {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getTimings.php?q=" + showid + "&type=" + type, true);
    xmlhttp.send();
}

function showTime(showid) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getBookings.php?q=" + showid, true);
    xmlhttp.send();
}

function searchShows() {
    var movieid = document.getElementById("movieid").value;
    var showid = document.getElementById("showid").value;
    if (movieid == '' || showid == '') {
        alert();
    } else {
        window.location.href = "movie-select-show.php?q=" + movieid + "&show=" + showid;
    }
}

var seats = [];
var grandtotal = 0;

function chooseSeat(seatno) {
    var price = parseInt(document.getElementById('price').value);
    var audi = (document.getElementById('audi').value);
    var index = seats.indexOf(seatno);
    //alert(index);
    if (index >= 0) {
        seats.splice(index);
        if (audi == 'Audi3') {
            document.getElementById(seatno).className = "seat";
        } else {
            document.getElementById(seatno).className = "btn btn-primary btns";
        }
    } else {
        seats.push(seatno);
        if (audi == 'Audi3') {
            document.getElementById(seatno).className = "activeSeat";
        } else {
            document.getElementById(seatno).className = "btn btn-secondary btns";
        }
    }
    grandtotal = (seats.length * price) + 42;
    document.getElementById("seatnos").innerHTML = seats;
    document.getElementById("ppl").innerHTML = seats.length;
    document.getElementById("mprice").innerHTML = price;
    document.getElementById("grandTotal").innerHTML = grandtotal;

}

function pay(useremail, timeid) {
    if (useremail == '') {
        window.location.href = "userlogin.php?q=" + timeid;
    } else {
        if (seats.length == 0) {
            alert();
        } else {
            var options = {
                "key": "rzp_test_dRWiKHS7zr2Gki",
                "amount": grandtotal * 100,
                "name": "Book My Show",
                "description": "Book My Show",
                "image": "http://ecourses.aec.edu.in/aditya/images/po4.png",
                "handler": function (response) {
                    //alert(response.razorpay_payment_id);
                    if (response.razorpay_payment_id == "") {
                        //alert('Failed');
                        window.location.href = "add_payment_details.php?status=failed";
                    } else {
                        //alert('Success');
                        window.location.href = "insert_payment.php?status=success&gd=" + grandtotal + "&timeid=" + timeid + "&seats=" + seats + "&totalseats=" + seats.length;
                    }
                },
                "prefill": {
                    "name": "",
                    "email": useremail
                },
                "notes": {
                    "address": ""
                },
                "theme": {
                    "color": "#F37254"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    }
}

function contact() {
    var controls = document.getElementById("contact1").elements;
    var formdata = new FormData();
    for (i = 0; i < controls.length; i++) {
        formdata.append(controls[i].name, controls[i].value);
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("coutput").innerHTML = this.responseText;
        }
        else {
            document.getElementById("coutput").innerHTML = "Processing...";
        }
    };
    xmlhttp.open("POST", "contactaction.php", true);
    xmlhttp.send(formdata);
}