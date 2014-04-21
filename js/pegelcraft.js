  $.ajax({
                url: 'https://static.centzilius.de/mcapi/api.php?ip=5.45.100.62',
                type: "GET",
                dataType: "json",
                success: function(res){
                    $('#IP').html(res.HostIp);
                    $('#Port').html(res.HostPort);
		    $('#Version').html(res.Version);
		    $('#Map').html(res.Map);
		    $('#GameMode').html(res.GameType);
		    $('#Players').html(res.Players);
		    $('#MaxPlayers').html(res.MaxPlayers);
                }
            });
