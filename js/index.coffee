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

# @var {object} The default preestablished model data.
model_presets =
    hornero:
        model:
            pos: "0 0 0"
            rot: "-50 0 0"
            scale: "0.5 0.5 0.5"
            model_url:
                model_type: 'obj'
                obj_url: './modelos/hornero.obj'
                mlt_url: './modelos/hornero.mlt'

    cara:
        model:
            pos: "0 0 0"
            rot: "-50 0 0"
            scale: "0.5 0.5 0.5"
            model_url:
                model_type: 'obj'
                obj_url: './modelos/cara.obj'
                mlt_url: './modelos/cara.mlt'
    oso:
        model:
            pos: "0 0 0"
            rot: "0 90 -90"
            scale: "5 5 5"
            model_url:
                model_type: 'obj'
                obj_url: './modelos/oso.obj'
                mlt_url: './modelos/oso.mlt'
    carrot:
        model:
            pos: "0 0 0"
            rot: "-50 0 0"
            scale: "0.5 0.5 0.5"
            model_url:
                model_type: 'gltf'
                gltf_url: './modelos/carrot.glb'

generate_model_str = (model) ->
    str =
        'position="' + model.pos + '"\n' +
        'rotation="' + model.rot + '"\n' +
        'scale="' + model.scale + '"\n'

    if model.model_url.model_type == 'gltf'
        str += 'gltf-model="' + model.model_url.gltf_url + '"'
    else
        str += 'obj-model="obj:url(' + model.model_url.obj_url + ');'
        str += 'mlt:url(' + model.model_url.mlt_url + ')"'

    str

# Process the data into an URL for the game.
#
# @param data {object} The data. See get_data()
# @return {URL} The URL object with all the information in the GET parameter.
export generate_url = (data) ->
    local_url = new URL document.URL
    url = new URL local_url.origin
    url.pathname = 'juego.php'
    url.searchParams.set 'pregunta', data.pregunta
    url.searchParams.set 'jugadores', data.jugadores
    url.searchParams.set 'op1', data.op1
    url.searchParams.set 'op2', data.op2
    url.searchParams.set 'opc', data.opc

    if $("#radio-preset")[0].checked
        modelname = data.model.preset_name
        modeldata = generate_model_str model_presets[modelname].model
    else
        modeldata = generate_model_str data.model
    url.searchParams.set 'modeldata', modeldata
    
    url

# Get the model data in JSON format.
#
# @return {object}
export get_model_data = () ->
    if $("#radio-preset")[0].checked
        model =
            type: 'preset'
            preset_name: $("select#preset-name").val()
    else
        model =
            type: 'custom'
            pos: $("#model-pos").val()
            rot: $("#model-rot").val()
            scale: $("#model-scale").val()
            model_url: null
    if $("#radio-gltf")[0].checked
        model.model_url =
            model_type: 'gltf'
            gltf_url: $("#model-gltf").val()
    else
        model.model_url = 
            model_type: 'obj'
            obj_url: $("#model-obj").val()
            mlt_url: $("#model-mlt").val()
    model

# Get the JSON data from the form.
# 
# @return {object} The form data in JSON format.
export get_data = () ->
    if $("#radio-op1")[0].checked
        opc = 1
    else
        opc = 2

    pregunta: $("#pregunta").val()
    jugadores: $("#jugadores").val()
    op1: $("#op1").val()
    op2: $("#op2").val()
    opc: opc
    model: get_model_data()

update_show_model = () ->
    # Show preseted URLs
    if $("input#radio-preset")[0].checked
        show_preset_url()
    else
        show_custom_url()

show_preset_url = () ->
    $("#custom-url").hide()
    $("#preset-url").show()

show_custom_url = () ->
    $("#custom-url").show()
    $("#preset-url").hide()

    update_show_modeltype()

update_show_modeltype = () ->
    if $("input#radio-gltf")[0].checked
        $("#model-gltf").show()
        $("#model-obj").hide()
        $("#model-mlt").hide()
    else
        $("#model-gltf").hide()
        $("#model-obj").show()
        $("#model-mlt").show()

update_url = () ->
    data = get_data()
    url = generate_url data

    inputtext = $("#url")
    inputtext.val url.href
    link = $("a#url-resultado")
    link.attr 'href', url.href

export assign_events = () ->
    $("input.data").on 'input', update_url
    $("input[type=radio]").on 'change', update_url

    $("input[name=model]").on 'change', update_show_model
    $("input[name=model-type").on 'change', update_show_modeltype
    $("select").on 'change', update_url


$(document).ready () ->
    update_url()
    update_show_model()
    assign_events()
    console.log "index initalization complete"
