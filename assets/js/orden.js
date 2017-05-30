class  Pedido_producto{
  constructor(producto_id, cantidad){
    this._producto_id = producto_id;
    this._cantidad = cantidad;
  }
  get producto_id(){
    return this._producto_id;
  }
  set producto_id(producto_id){
    this._producto_id=producto_id;
  }
  get cantidad(){
    return this._cantidad;
  }
  set cantidad(cantidad){
    this._cantidad=cantidad;
  }
}
