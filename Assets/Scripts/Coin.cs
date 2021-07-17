using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Coin : MonoBehaviour
{
    private float speed = 1.5f;



    private void Update()
    {
        transform.Translate(Vector2.left * speed * Time.deltaTime);
    }

    void OnTriggerEnter2D(Collider2D other)
    {
        if (other.CompareTag("Player"))
        {
            other.GetComponent<Player>().coinsCount += 1;
            Debug.Log("Coin Count: " + other.GetComponent<Player>().coinsCount);
            Destroy(gameObject);
        }
    }

}
