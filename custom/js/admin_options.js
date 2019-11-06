$('#admin-options-list a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

$(document).ready(()=>{
    var versionUrl = "https://raw.githubusercontent.com/xIvan0ff/YourTube/master/version.txt";
    $.ajax({
        type: "GET",
        url: versionUrl,
        success: function(data)
        {
            $("#latest-ver").text(data);
            let currentVer = $("#current-ver").text();
            let latestVer = $("#latest-ver").text();
            let compare = versionCompare(currentVer, latestVer);
        
            let text;
            
            switch(compare)
            {
                case 0:
                    text = '<span class="text-success">Your version is up to date.</span>';
                    break;
                case -1:
                    text = '<span class="text-danger">You are using an outdated version.</span>';
                    break;
                case 1:
                    text = '<span class="text-warning">You are using a modified version.</span>';
                    break;
            }

            $("#version-check").html(text);
            $("#version-compare").removeClass("d-none");
        }
    });
});

$(document).ready(()=>{
    var adminFuncUrl = maindir + "/functions/admin_functions.php";
    $.ajax({
        type: "POST",
        url: adminFuncUrl,
        data: {admin_data: '1'},
        success: function(result)
        {
            let data = result.split('|');
            if((typeof $('#users-count') !== 'undefined') && (typeof $('#logs-count') !== 'undefined'))
            {
                $('#users-count').attr('data-count', data[0]);
                $('#logs-count').attr('data-count', data[1]);
            }
        }
    });
});

// VERSION COMPARE FUNCTION //


function versionCompare(v1, v2, options) {
    var lexicographical = options && options.lexicographical,
        zeroExtend = options && options.zeroExtend,
        v1parts = v1.split('.'),
        v2parts = v2.split('.');

    function isValidPart(x) {
        return (lexicographical ? /^\d+[A-Za-z]*$/ : /^\d+$/).test(x);
    }

    if (!v1parts.every(isValidPart) || !v2parts.every(isValidPart)) {
        return NaN;
    }

    if (zeroExtend) {
        while (v1parts.length < v2parts.length) v1parts.push("0");
        while (v2parts.length < v1parts.length) v2parts.push("0");
    }

    if (!lexicographical) {
        v1parts = v1parts.map(Number);
        v2parts = v2parts.map(Number);
    }

    for (var i = 0; i < v1parts.length; ++i) {
        if (v2parts.length == i) {
            return 1;
        }

        if (v1parts[i] == v2parts[i]) {
            continue;
        }
        else if (v1parts[i] > v2parts[i]) {
            return 1;
        }
        else {
            return -1;
        }
    }

    if (v1parts.length != v2parts.length) {
        return -1;
    }

    return 0;
}