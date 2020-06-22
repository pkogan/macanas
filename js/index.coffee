# index.coffee --
# Copyright (C) 2020 cnngimenez

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.

# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

generate_url = (data) ->
    local_url = new URL document.URL
    url = new URL local_url.origin
    url.pathname = 'juego.php'
    url.searchParams.set 'pregunta', data.pregunta
    url.searchParams.set 'jugadores', data.jugadores
    url.searchParams.set 'op1', data.op1
    url.searchParams.set 'op2', data.op2
    url.searchParams.set 'opc', data.opc
    url

get_data = () ->
    if $("#radio-op1")[0].checked
        opc = 1
    else
        opc = 2
    pregunta: $("#pregunta").val()
    jugadores: $("#jugadores").val()
    op1: $("#op1").val()
    op2: $("#op2").val()
    opc: opc

update_url = () ->
    data = get_data()
    url = generate_url data

    inputtext = $("#url")
    inputtext.val url.href
    link = $("a#url-resultado")
    link.attr 'href', url.href

assign_events = () ->
    $("input.data").on 'input', update_url
    $("input[type=radio]").on 'change', update_url



$(document).ready () ->
    update_url()
    assign_events()
    console.log "index initalization complete"
