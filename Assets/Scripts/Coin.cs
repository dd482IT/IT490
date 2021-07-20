using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Coin : MonoBehaviour
{
    private float speed = 2f;
    public GameObject effect;

    private void Update()
    {
        transform.Translate(Vector2.left * speed * Time.deltaTime);
    }

    void OnTriggerEnter2D(Collider2D other)
    {
        if (other.CompareTag("Player"))
        {

            Instantiate(effect, transform.position, Quaternion.identity);

            other.GetComponent<Player>().coinsCount += 1;
            Debug.Log("Coin Count: " + other.GetComponent<Player>().coinsCount);
            Destroy(gameObject);
        }
    }

}
