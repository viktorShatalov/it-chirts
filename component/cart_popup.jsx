"use strict";
const { useState, useEffect } = React;

const LikeButton = () => {
  return (
    <React.Fragment>
      <Item />
      <Item />
      <Footer />
    </React.Fragment>
  );
};

const Item = () => {
  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  // получаем всё
  useEffect(() => {
    fetch(`https://it-shirts.div-head-1.h1n.ru/wp-json/${"wc/v3/customers/"}`)
      .then((res) => res.json())
      .then(
        (res) => {
          console.log(res);
        },
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      );
  }, []);

  return (
    <React.Fragment>
      <div className="cart__item">
        <div className="cart__item-del">
          <a href="" className="cart__item-icon"></a>
        </div>
        <div className="cart__item-img">
          <a href="ptoduct__link">{/* <img src="img/img1.jpg" alt=""> */}</a>
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
          <span className=" cart__item-title__price">439 грн.</span>
        </div>
        <div className="cart__item-count">
          <a className="count__minus" href=""></a>
          <input className="count__number" type="text" defaultValue="1" />
          <a className="count__plus" href=""></a>
        </div>
        <div className="cart__item-price">
          <span>439 грн.</span>
        </div>
      </div>
    </React.Fragment>
  );
};

const Footer = () => {
  return (
    <React.Fragment>
      <div className="modal__footer">
        <a className="bac__to__shop" href="/">
          Продолжить покупки
        </a>
        <span className="modal__footer-tottal">
          Итого:
          <span className="woocommerce-Price-amount amount">
            87811
            <span className="woocommerce-Price-currencySymbol">грн.</span>
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
    <LikeButton />
  </React.Fragment>,
  domContainer
);
