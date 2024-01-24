let MEmatchscript = document.currentScript;
let DMN = "cricketdata.org";
(function () {
    window.cricapi = window.cricapi || {};
    let c = document.createElement("div");
    c.innerHTML = `<style>
#cricapi_widget_matchlist {
/*background-image:url('https://cdorg.b-cdn.net/img/wm.png');*/
background-color:#fff;
background-size:15%;
user-select:none;
}
#cricapi_widget_matchlist * {box-sizing: content-box; font-family: Arial, sans-serif;line-height:1.2;position:relative;}
#cricapi_widget_matchlist h6 {font-size: 1.2em;margin:0px;}
#cricapi_widget_matchlist TABLE { margin:0px; }
#cricapi_widget_matchlist TH,#cricapi_widget_matchlist TD { padding:1px; border-bottom:1px solid #e5e5e5; border-top: 0;border-left: 0;text-align:left;border-right: 0; }
#cricapi_widget_matchlist HR { clear: both;height: 1px;min-height: 0;border-top: 1px solid #e5e5e5; border-right: 0;border-bottom: 0;border-left: 0;padding:0px;margin:0px; background: transparent;}
#cricapi_widget_matchlist #loading {display:none;}

#cricapi_widget_matchlist {
    background:#fff;
    position:relative;
    max-height:50vh;
    border:1px #080 solid;
}

#cricapi_widget_matchlist SPAN {
    padding:0 !important;
}

#cricapi_widget_matchlist .criclogo {
        display: inline-block !important;
        max-width: 100%;
        height: 1.2em;
        width:1.2em;
        margin: auto auto 5px auto !important;
        border-radius: 24px !important;
        border:1px #ddd solid;
        line-height:1.2em;
        float:left;
}

#cricapi_modal {
    position:fixed;
    top:0px;left:0px;right:0px;bottom:0px;
    background:#fff;
    z-index:9999999999;
}
#cricapi_modal IFRAME {
    width:100%;
    height:100%;
    max-width:100%;
    max-height:100%;
}
#cricapi_widget_matchlist {
    min-width:350px;
    max-width:600px;
    height:auto;
    min-height:300px;
    display:block;
    margin:auto;
}

/* Style the tab */
#cricapi_widget_matchlist .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
    text-align:center;
}

/* Style the buttons that are used to open the tab content */
#cricapi_widget_matchlist .tab button {
  background-color: inherit;
  border: none;
  border-radius: 0;
  font-size: 1em;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
#cricapi_widget_matchlist .tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
#cricapi_widget_matchlist .tab button.active {
  background-color: #080;
    color:#fff;
}

/* Style the tab content */
#cricapi_widget_matchlist .tabcontent {
  overflow-y: auto;
  display: none;
  padding: 6px 0px;
  border: 1px solid #ccc;
  border-top: none;
  animation: fadeEffect 0.7s; /* Fading effect takes 1 second */
  text-align:left;
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

#cricapi_widget_matchlist .tabcontent>DIV {
    padding:3px 6px;
}

#cricapi_widget_matchlist .tabcontent>DIV:hover {
background:#efe;
}

#cricapi_floater {
    position:absolute;
top:0px;left:0px;right:0px;bottom:0px;width:100%;height:100%;z-index:2;
}
</style>
<div id="cricapi_widget_matchlist">
<div id='loadwin' 
style="background:url('https://cdorg.b-cdn.net/img/widgetbg.webp') #fff;background-size:contain;background-repeat:no-repeat;background-position:center;top:0;left:0;right:0;bottom:0;position:absolute;width:100%;height:100%;z-index:2;">
</div>
<div id='cricapi_floater' style='display:none;background:#fff; color:#000;'>
<a href='javascript:;' style='position:absolute;top:0px;right:0px;font-size:2em;background:#080;color:#fff;text-decoration:none;padding:5px 0.6em;' onclick="document.getElementById('cricapi_floater').style.display='none';">&times;</a>
hello world
</div>

<!-- Tab links -->
<div class="tab">
<span id='loading' 
style='position:absolute;top:0px;right:1em;
font-weight:bold;display:inline-block;float:right;color: #b00;
    font-size: 1.2em;'>...</span>

  <button class="tablinks fixtures" onclick="cricapi.openTab(event, 'Fixture')">Fixture</button>
  <button class="tablinks default" onclick="cricapi.openTab(event, 'Live')">Live</button>
  <button class="tablinks results" onclick="cricapi.openTab(event, 'Result')">Result</button>
</div>

<div id="Fixture" class="tabcontent match_fixtures"></div>
<div id="Live" class="tabcontent match_live"></div>
<div id="Result" class="tabcontent match_results"></div>

<a style="color:#000;font-size:8px;position:absolute;top:5px;right:5px;text-align:center;" href="https://cricketdata.org/widgets-for-your-website-blog/">Get this Widget</a>
</div>

<div id='cricapi_modal' style='display:none;'>
<div style="position:absolute;top:0px;right:0px;">
<a href='javascript:;' style='font-size:2em;background:#fff;color:#080;text-decoration:none;padding:5px 0.6em;' 
onclick="cricapi.reloadFrame();">&#8635;</a>
<a href='javascript:;' style='font-size:2em;background:#080;color:#fff;text-decoration:none;padding:5px 0.6em;' 
onclick="document.getElementById('cricapi_modal').style.display='none';document.getElementById('cricapi_details_modal_frame').srcdoc='...';">&times;</a>
</div>
<iframe id='cricapi_details_modal_frame' onload='this.removeAttribute("srcdoc");' frameborder=0 src='https://cdorg.b-cdn.net/img/widgetbg.webp'></iframe></div>
`;
    var last_iframe_URL = "";
    window.cricapi.showModal = function (x) {
        last_iframe_URL = x;
        document.getElementById('cricapi_details_modal_frame').srcdoc = "<center><br/><br><h1 style='font-family:sans-serif,sans;'>Loading...</h1><br><progress></progress></center>";
        document.getElementById('cricapi_modal').style.display = 'block';
        document.getElementById('cricapi_details_modal_frame').src = x;
    }

    window.cricapi.reloadFrame = function (x) {
        cricapi.showModal(last_iframe_URL);
    }

    if (!document.querySelector("#cric_data_live_matchlist"))
        MEmatchscript.after(c)
    else
        document.querySelector("#cric_data_live_matchlist").append(c);

    setTimeout(() => {
        let x = document.getElementById("cricapi_modal");
        document.getElementById("cricapi_modal").remove();
        document.body.appendChild(x);
    }, 200);

    let cricapi_widget_matchlistData = null;
    let box = document.getElementById("cricapi_widget_matchlist");
    let widgetWidth = box.clientWidth;
    let widgetHeight = box.clientHeight;
    box.scrollLeft = 0;

    function stylize() {
        widgetWidth = box.clientWidth;
        widgetHeight = box.clientHeight;
        //    Array.from(document.querySelectorAll("#cricapi_widget_matchlist .slab"))
        //        .forEach(x => {
        //            x.style.width = (widgetWidth - 20) + "px";
        //            x.style.height = (widgetHeight - 20) + "px";
        //        });
    }

    cricapi.prepMatch = function prepMatch() {
        let hh = box.clientHeight - document.querySelector("#cricapi_widget_matchlist>.tab").clientHeight - 14;
        Array.from(document.querySelectorAll("#cricapi_widget_matchlist .tabcontent")).forEach(x => {
            x.style.height = hh + "px";
        });
        document.querySelector("#cricapi_widget_matchlist #loading").style.display = 'block';
        fetch("https://" + DMN + "/apis/prepmatchlist.aspx?k=" + Math.floor(new Date().getTime() / 5000) + "&r=" + encodeURIComponent(location.href))
            .then(x => x.json())
            .then(function (data) {
                document.querySelector("#cricapi_widget_matchlist #loading").style.display = 'none';

                cricapi_widget_matchlistData = data.map(x => {
                    if (x.t1i) x.t1i = "https://" + DMN + "/iapi/" + x.t1i + "?w=48";
                    if (x.t2i) x.t2i = "https://" + DMN + "/iapi/" + x.t2i + "?w=48";
                    return x;
                });

                cricapi.updateDisplay();
            });
    }

    function updateTimr() {
        let prepNeeded = false;
        Array.from(document.querySelectorAll("#cricapi_widget_matchlist .match_fixtures .timr"))
            .forEach(function (X) {
                let d = X.dataset["d"];
                let diff = new Date(d + "Z") - new Date();
                let timediff = "...";

                let td = 0;
                td = diff / 1000;
                if (td < 0) {
                    prepNeeded = true;
                } else timediff = secondsToHMS(td).split(".")[0];

                X.innerText = timediff;
            });

        if (prepNeeded) setTimeout(cricapi.prepMatch, 100);
    }

    cricapi.updateDisplay = function updateDisplay() {
        let dd = new Date();
        if (!cricapi_widget_matchlistData || !(cricapi_widget_matchlistData.length)) return;
        document.querySelector(`#cricapi_widget_matchlist .match_fixtures`).innerHTML = cricapi_widget_matchlistData
            .filter(x => (x.ms == "fixture"))
            .map(x => {
                x.diff = new Date(x.d + "Z") - new Date();
                return x;
            })
            .sort((A, B) => {
                return (A.diff == B.diff) ? ('' + A.t1).localeCompare(B.t2) : (A.diff - B.diff);
            })
            .map(x => cricapi.htmlize_matchlist(x)).join(' ');

        document.querySelector(`#cricapi_widget_matchlist .match_live`).innerHTML = cricapi_widget_matchlistData
            .filter(x => (x.ms == "live"))
            .sort((A, B) => (A.diff - B.diff))
            .map(x => cricapi.htmlize_matchlist(x)).join(' ');

        if (document.querySelector(`#cricapi_widget_matchlist .match_live`).innerHTML == '') {
            document.querySelector(`#cricapi_widget_matchlist .match_live`).innerHTML = `<center><br>No live matches found.<br><Br>
<a style='background:#080;color:#fff;border-radius:10px;padding:5px;font-size:13px;' href="javascript:;" onclick="document.querySelector('#cricapi_widget_matchlist .tablinks.results').click();">See recent results</a><Br><Br>
<a style='background:#800;color:#fff;border-radius:10px;padding:5px;font-size:13px;' href="javascript:;" onclick="document.querySelector('#cricapi_widget_matchlist .tablinks.fixtures').click();">See fixtures</a>
</center>`;
        }

        document.querySelector(`#cricapi_widget_matchlist .match_results`).innerHTML = cricapi_widget_matchlistData
            .filter(x => (x.ms == "result"))
            .map(x => cricapi.htmlize_matchlist(x)).join(' ');

        document.querySelector("#cricapi_widget_matchlist #loadwin").style.display = 'none';
    }

    setInterval(cricapi.prepMatch, 7000);
    setInterval(updateTimr, 1000);
    stylize(); cricapi.prepMatch();

    setTimeout(() => {
        document.querySelector("#cricapi_widget_matchlist .tablinks.default").click();
    }, 200);

    function secondsToHMS(secs) {
        function z(n) { return (n < 10 ? '0' : '') + n; }
        var sign = secs < 0 ? '-' : '';
        secs = Math.abs(secs);
        return sign + z(secs / 3600 | 0) + ':' + z((secs % 3600) / 60 | 0) + ':' + z(secs % 60);
    }

    cricapi.htmlize_matchlist = function (x) {
        let timediff = "";
        if (x.diff) {
            let td = 0;
            td = x.diff / 1000;
            if (td < 0) {
                timediff = "...";
                x.ms = "live";
                setTimeout(cricapi.prepMatch, 100);
            } else timediff = secondsToHMS(td).split(".")[0];
        }

        //if (timest.getTime() > timeen.getTime()) ;{
        //    timediff = x.diff
        //}

        return `<div data-id='${x.id}'
title="${x.t1n} [${x.t1s}] vs ${x.t2n} [${x.t2s}]"
onclick="cricapi.showModal('https://cricketdata.org/cricket-data-formats/matches/${x.u}');"
style='border-bottom:1px #eee solid;cursor:pointer;'>
<span style='float:right;font-size:0.7em;color:#080;text-transform:uppercase;'>${x.t}</span>
<b style='display:inline-block;line-height:1.3em;'><img loading='lazy' alt='Cricket Data API with Team Logos' class='criclogo' ${(x.t1i ? ` src='${x.t1i}' ` : "style='display:none!important;'")} />&nbsp;${x.t1}</b> <span style='color:#ef9930;font-size:0.9em;'>${x.t1s}</span> 
vs
<b style='display:inline-block;line-height:1.3em;'><img loading='lazy' alt='CricAPI Live Score Data API' class='criclogo' ${(x.t2i ? ` src='${x.t2i}' ` : "style='display:none!important;'")}  />&nbsp;${x.t2}</b> <span style='color:#3099bf;font-size:0.9em;'>${x.t2s}</span><br/>
<span style='float:right;font-size:0.7em;color:#088'>${x.d.split("T")[0]}</span>
<span style='font-size:0.9em;'>${x.s}</span> <span class='timr' data-d='${x.d}' style='font-size:0.9em;'>${timediff}</span></div>`;
    }

    cricapi.floatr = function (x) {
        //document.querySelector("#cricapi_widget_matchlist #cricapi_floater").style.display = 'block';
        // -- document.getElementById('cricapi_details_modal_frame').srcdoc = "<center><br/><br><h1 style='font-family:sans-serif,sans;'>Loading...</h1><br><progress></progress></center>";
        // -- document.getElementById('cricapi_modal').style.display = 'block';
        // -- document.getElementById('cricapi_details_modal_frame').src = x;

    };
    cricapi.openTab = function (evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.querySelectorAll("#cricapi_widget_matchlist .tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.querySelectorAll("#cricapi_widget_matchlist .tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.querySelector("#cricapi_widget_matchlist #" + cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
})();