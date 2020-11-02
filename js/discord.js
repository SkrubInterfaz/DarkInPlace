var serverID = '557178315471978515';
$.getJSON('https://discordapp.com/api/servers/' + serverID + '/widget.json', function (data) {
	$membresenligne = data.presence_count;
	$('.discord-channel').html('En ligne (' + $membresenligne + ')');
	for (i = 0; i < $membresenligne; i++) {
		var item = document.createElement('li');
		item.setAttribute('class', 'discord-user');
		var img = document.createElement('img');
		img.setAttribute('src', data.members[i].avatar_url);
		img.setAttribute('class', 'discord-avatar');
		var div = document.createElement('div');

		if (data.members[i].status == 'online') {
			div.setAttribute('class', 'discord-user-status discord-online');
		} else {
			if (data.members[i].status == 'dnd') {
				div.setAttribute('class', 'discord-user-status discord-dnd');
			} else {
				div.setAttribute('class', 'discord-user-status discord-idle');
			}
		}

		var text = document.createTextNode(data.members[i].username);
		item.appendChild(img);
		item.appendChild(div);
		item.appendChild(text);

		$('.discord-userlist').append(item);
	}
});