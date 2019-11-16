import ajax from 'zan-ajax';

function getSettingItem() {
  return ajax({
    url: '/items',
    type: 'GET'
  });
}

export {
  getSettingItem,
};
