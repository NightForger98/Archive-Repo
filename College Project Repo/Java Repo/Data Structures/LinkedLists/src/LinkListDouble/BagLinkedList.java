package LinkListDouble;
import java.util.Iterator;
import java.util.NoSuchElementException;
public class BagLinkedList<Item> implements Iterable<Item> {
	private int N;
	private Node<Item> first;
	public BagLinkedList(){
		first = null;
		N = 0;
		}
	public boolean isEmpty() {return first == null;}
	public int size() {return N;}
	public void add(Item item) {
		Node<Item> oldfirst = first;
		first = new Node<Item>();
		first.setItem(item);
		first.setNext(oldfirst);
		N++;
	}
	@Override
	public Iterator<Item> iterator(){
		return new ListIterator();
	}
	private class ListIterator implements Iterator<Item>{
		private Node<Item> current = first;
		@Override
		public boolean hasNext() {return current != null;}
		@Override
		public void remove() {
			throw new UnsupportedOperationException();
		}
		@Override
		public Item next() {
			if (!hasNext())
				throw new NoSuchElementException();
			Item item = (Item) current.getItem();
			current = current.getNext();
			return item;
		}
		
		}
	}


