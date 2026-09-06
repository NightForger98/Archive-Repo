package LinkListDouble;

public class BagArray <Item>
implements Cloneable,Comparable<BagArray<Item>> {
	private Item []data;
	private int items;
	BagArray( int initialCapacity){
	if(initialCapacity < 0 )
		throw new IllegalArgumentException
		("initialCapacity is negative: " + initialCapacity);
	items = 0;
	data = (Item[]) new Object [initialCapacity];}
	
	BagArray() {
	items = 0;
	data = (Item[])new Object [10];
	}
	
	
	public void addMany(Item... elements) {
		if(items + elements.length> data.length)
			ensureCapacity((items + elements.length)*2);
		System.arraycopy(elements, 0, data, items,elements.length);
		items += elements.length;
	}
	public void add(Item element) {
		if (items == data.length)
			ensureCapacity(items * 2 + 1);
		data[items] = element;
		items++;
	}
	public void addAll (BagArray<Item> i) {
		ensureCapacity(items + i.items);
		System.arraycopy(i.data, 0, data, items, i.items);
		items += i.items;
	}
	public boolean remove(Comparable target) {
		int i = contains(target);
		if(i != -1) {
			items--;
			data[i] = data[items];
			return true;
		}
		return false;
	}
	public int contains(Comparable<Item> i) {
		for(int j = 0;j<data.length; ++j) {
			if(i.compareTo(data[j])==0)
				return j;
		}
		return -1;
	}
	public int countOccurrences(Comparable<Item> i) {
		int count = 0 ;
		for(int index =0;index < items; ++index)
			if(i.compareTo(data[index]) == 0)
				count++;
		return count;
	}
	public static BagArray union(BagArray b1, BagArray b2) {
		BagArray answer = new BagArray(b1.getCapacity()+ b2.getCapacity());
	System.arraycopy(b1.data,0, answer.data, 0, b1.items);
	System.arraycopy(b2.data, 0, answer.data, b1.items, b2.items);
	answer.items = b1.items + b2.items;
	return answer;
	}
	@Override
	public BagArray<Item> clone(){
		BagArray<Item> answer;
		try {
			answer = (BagArray<Item>) super.clone();
			
		}catch (CloneNotSupportedException e) {
			throw new RuntimeException
			("This class does not implement Cloneable.");
		}
		answer.data = data.clone();
		return answer;
	}
	public void ensureCapacity (int minimumCapacity) {
		Item[] biggerArray;
		if(data.length < minimumCapacity) {
			biggerArray = (Item[])new Object [minimumCapacity];
			System.arraycopy(data, 0, biggerArray, 0, items);
			data = biggerArray;
		}
	}
	public Item grab() {
		int i;
		if(items == 0)
			throw new IllegalStateException("Bag size is zero.");
		i = (int)(Math.random()* items);
		return (Item) data[i];
	}
	public void trimToSize() {
		Item[] trimmedArray;
		if(data.length != items) {
			trimmedArray = (Item[]) new Object [items];
			System.arraycopy(data, 0, trimmedArray, 0, items);
			data = trimmedArray;
		}
	}
	public int size() {return items;}
	public int getCapacity() {
		return data.length;
	}
	public Item getItem(int i) {
		if(i >= 0 && i < items)
			return data[i];
		else
			throw new IllegalStateException
			("Bag is empty!");
	}
	private int compare(BagArray<Item> v) {
		for(int j =0;j<size(); ++j) {
			if(((Item)data[j]).equals((Item)(v.data[j])))
					continue;
			return this.hashCode() - v.hashCode();
			
		}
		return 0;
	}
@Override 
	public int compareTo(BagArray<Item> ba) {
	return compare(ba);
}

}
