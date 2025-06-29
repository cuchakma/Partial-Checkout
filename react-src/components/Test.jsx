import imageUrl from '@/images/banner-772x250.png?url';
import Helper from '../helpers/Helper';

const Text = () => {
    let url = Helper.getImageUrl(imageUrl);
    return <img src={url}/>
}

export default Text;