"use strict";
const { useState, useEffect } = React;

const ContentItem = () => {
  const url = "https://it-shirts.div-head-1.h1n.ru";
  const [count, setCount] = useState(1);
  const [price, setPrice] = useState(439);
  let priceTotal = count * price;

  // получаем всё
  useEffect(() => {
    fetch(`${url}/wp-json/wp/v2/`)
      .then((res) => res.json())
      .then(
        (res) => {
          console.log(res);
        },
        (error) => {
          console.log(error);
        }
      );
  }, []);

  return (
    <React.Fragment>
      <Item
        price={price}
        setCount={setCount}
        count={count}
        priceTotal={priceTotal}
      />
      <Footer priceTotal={priceTotal} />
    </React.Fragment>
  );
};

const Item = (props) => {
  let setCount = props.setCount;
  let count = props.count;
  return (
    <React.Fragment>
      <div className="cart__item">
        <div className="cart__item-del">
          <a href="" className="cart__item-icon"></a>
        </div>
        <div className="cart__item-img">
          <a href="ptoduct__link">
            <img src="img/img1.jpg" alt="" />
          </a>
        </div>
        <div className="cart__item-title">
          <a href="">
            Футболка «Развиваю инстинкт автосохранения» для тех, кому дороги
            нервы
          </a>
          <span className="cart__item-atribute">
            <span className="cart__item-atribute__variation">Цвет: Белая</span>
            <span className="cart__item-atribute__variation">Размер: M</span>
          </span>
          <span className=" cart__item-title__price">{props.price} грн.</span>
        </div>
        <div className="cart__item-count">
          <a
            className="count__minus"
            href=""
            onClick={(e) => {
              e.preventDefault();
              if (count <= 1) {
                setCount(count);
              } else {
                setCount(count - 1);
              }
            }}
          ></a>
          <span className="count__number">{count}</span>
          <a
            href=""
            className="count__plus"
            onClick={(e) => {
              e.preventDefault();
              setCount(count + 1);
            }}
          ></a>
        </div>
        <div className="cart__item-price">
          <span>{props.priceTotal} грн.</span>
        </div>
      </div>
    </React.Fragment>
  );
};

const Footer = (props) => {
  return (
    <React.Fragment>
      <div className="modal__footer">
        <a className="bac__to__shop" href="/">
          Продолжить покупки
        </a>
        <span className="modal__footer-tottal">
          Итого:
          <span className="woocommerce-Price-amount amount">
            {props.priceTotal}
            <span className="woocommerce-Price-currencySymbol"> грн.</span>
          </span>
        </span>
        <a className="modal__footer-checkout" href="/checkout/">
          Оформить заказ
        </a>
      </div>
    </React.Fragment>
  );
};

const domContainer = document.querySelector("#root");
ReactDOM.render(
  <React.Fragment>
    <ContentItem />
  </React.Fragment>,
  domContainer
);
