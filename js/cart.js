"use strict";function totalMoney(){var t=0;$("table tr:gt(0)").not("table tr:last").each(function(){$(this).find(":checkbox").prop("checked")&&(t+=parseFloat($(this).find("td").eq(5).html()))}),$("table tr:last").find("span").html(t)}$(function(){$("table :checkbox:eq(0)").check($("table :checkbox:gt(0)")),$(":checkbox").click(function(){totalMoney()}),$(".addBtn").click(function(){var t=$(this).prev().html();t++,$(this).prev().html(t);var e=$(this).parent().prev().html()*t;$(this).parent().next().html(e),totalMoney()}),$(".reduceBtn").click(function(){var t=$(this).next().html();--t<1&&(t=0),$(this).next().html(t);var e=$(this).parent().prev().html()*t;$(this).parent().next().html(e),0==t&&$(this).parent().parent().find(":checkbox").prop("checked",!1),totalMoney()}),$(".delBtn").click(function(){confirm("亲，您真的要删除吗？")&&($(this).parent().parent().remove(),totalMoney())})}),$.ajax({url:"../json/goods.json",dataType:"json"}).then(function(t){var e=template("waterfall",{data:t});$(".items").html(e).waterfall()}),$(".btn").click(function(){$.ajax({url:"../json/goods.json",dataType:"json"}).then(function(t){var e=template("waterfall",{data:t});$(".items").append(e).waterfall()})});