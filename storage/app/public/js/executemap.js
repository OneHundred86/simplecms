function MapMain(mapvalue, initAdd){
  this.mapChildNode = document.querySelector(mapvalue).querySelectorAll("select");
  this.flagMap = [mapAllData, [], [], []];  // flagMap[0]-省， flagMap[1]-市， flagMap[2]-区， flagMap[3]-街道 
  this.chinaInitAdd = initAdd && initAdd.constructor==Array?initAdd:['— 省 —', '— 市 —', '— 区 —', '— 街道 —'];
  this.mapOptionInit();
}
MapMain.prototype = {
  constructor: MapMain,  //增强对象
  chinaInitSe: ['— 省 —', '— 市 —', '— 区 —', '— 街道 —'],
  mapChildNodeRenderingHtml: function (i, addCode, initMap){  //初始化 和 重置select
    var _this = this;   //运行时this指向
    this.mapChildNode[i].innerHTML = '<option code="0" value="无">'+this.chinaInitSe[i]+'</option>';
    var s = '';
    if(initMap && i < ++initMap){  //渲染到下一个select
      this.flagMap[i].forEach(function(value){  
        s = addCode === value.code?"selected":"";
        _this.mapChildNode[i].innerHTML += '<option '+s+' code="'+value.code+'"  value="'+value.name+'" >'+value.name+'</option>';
      });
    }
  },
  mapChangeOptionHtml: function (selectIndex, optionCode, mapChildNodeLength){  //select change事件触发
    for(var i=mapChildNodeLength-1; i>selectIndex; --i){ 
      this.mapChildNodeRenderingHtml(i);  
      //重置select的值
      //如 重新选择省份 就重置市 区和街道的数据
    } 
    var _this = this;
    if(selectIndex >= --mapChildNodeLength){return;}  //防止数组越界

    this.flagMap[selectIndex].forEach(function(value){   //循环触发的select的数据
      if(optionCode === value.code && value.children !== null){ //匹配数据 并判断是否还有数据
        ++selectIndex;
        _this.flagMap[selectIndex] = value.children; //保存下一维数组
        _this.flagMap[selectIndex].forEach(function(data){  //输出下一维的数组数据
          _this.mapChildNode[selectIndex].innerHTML += '<option code="'+data.code+'" value="'+data.name+'">'+data.name+'</option>';
        });
  
      }
    });
  },
  mapOptionInit : function (){  //初始化数据
    var _this = this;
    var sessMap = _this.chinaInitAdd;
    var valueCode  = '';   //记录城市代码
    for(var i=0, x=0; i<_this.mapChildNode.length; ++i,x=i){
      if(i < sessMap.length && _this.flagMap[i]){ //避免全循环
        _this.flagMap[i].forEach(function(value){ 
          if(sessMap[i] === value.name && value.children !== null){ 
            _this.flagMap[++x] = value.children;   
            valueCode = value.code;
          }
        });
      }  
      _this.mapChildNodeRenderingHtml(i, valueCode, sessMap.length);
      valueCode = null;
      (function(ii){  ///闭包处理 //绑定select的change事件
        _this.mapChildNode[ii].addEventListener("change", function(){
          _this.mapChangeOptionHtml(ii, this.options[this.selectedIndex].getAttribute('code'), _this.mapChildNode.length)
        }, false);
      })(i)
    };
  },
}

/*

prototype是函数特有的属性，使用‘new’生成的对象没有prototype。
任何对象都有__proto__属性。
‘new’生成的对象的__proto__属性指向构造函数的prototype


//对象继承
function Mapmain (dom){ MapMain.call(this, dom); }
function inheritPrototype(subType, SuperType){
//subType 子类 SuperType 超类/父类
var prototype = Object.create(SuperType.prototype); //创建对象
prototype.constructor = subType; //增强对象
subType.prototype = prototype; //指定对象
}
inheritPrototype(Mapmain, MapMain);
*/
